<?php

namespace App\Http\Controllers;

use App\Contact_us;
use App\Emails;
use App\Models\Category;
use App\Models\Images;
use App\Models\Likes;
use App\Models\Products;
use App\Models\Products_publication;
use App\Models\SharedProduct;
use App\Models\Suppliers;
use App\Models\Systems;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('website.home');
    }

    public function showLang($lang){
        if (in_array($lang,['ar','en'])){
            if (session()->has('lang')){
                session()->forget('lang');
            }
            session()->put('lang',$lang);
        }else{
            if (session()->has('lang')){
                session()->forget('lang');
            }
            session()->put('lang','ar');
        }

        return  redirect()->back();
    }

    public function contact(){
        return view('website.contact_us');
    }

    public function contactUs(Request $request){
$contact=new Contact_us();
$contact->name=$request->name;
$contact->email=$request->email;
$contact->title=$request->title_message;
$contact->descr=$request->message;
$contact->save();
return response()->json(['success'=>'true']);
    }

    public function malingList(Request $request){
        $email=new Emails();
        $email->emails=$request->email;
        $email->save();
        return response()->json(['success','true']);
    }

    public function getProduct()
    {
        $products = Products::orderby('sorting', 'ASC')->with(['getSupplier.getUser'])->get();
        $suppliers = Suppliers::all();
        $categories = Category::where('parent_id', null)->get();
        $subcategories = Category::where('parent_id', '!=', null)->get();
        return view('website.products', compact('products', 'suppliers', 'categories', 'subcategories'));
    }

    public function documentaion_center()
    {
        $role_s = Role::where('name', 'suppliers')->first();
        $role_e = Role::where('name', 'employee')->first();
        $systems_e = Systems::all()->where('role_id', $role_e->id);
        $systems_s = Systems::all()->where('role_id', $role_s->id);
        return view('website.documentation_center', compact('systems_e', 'systems_s'));
    }

    public function supplier_detail($supplier_name)
    {
        $supplier = Suppliers::whereHas('getUser', function ($q) use ($supplier_name) {
            $q->where('username', $supplier_name);
        })->with(['getUser'])->first();
        $products_sup = Products::where('supplier_id', $supplier->id)->orderby('sorting', 'ASC')->with(['getSupplier.getUser'])->get();
        return view('website.supplier_detail', compact('supplier', 'products_sup'));
    }

    public function search_supplier(Request $request)
    {
        $supplier = Suppliers::whereHas('getUser', function ($q) use ($request) {
            $q->where('username', $request->supplier_id);

        })->with('getUser')->first();
        if ($request->arr) {
            $array = $request->arr;
        }
//        foreach ($request->arr as $arr) {
//            $supplier_id= Suppliers::whereHas('getUser', function ($q) use ($arr) {
//                $q->where('username', $arr);
//
//            })->with('getUser')->first();
//        }

        if (isset($supplier)) {
            $products = Products::where('supplier_id', $supplier->id)->with(['getSupplier', 'getSupplier.getUser'])->get();
            $session_en = session()->get('lang') == 'en';
            $name_supplier = trans('local.name_supplier');
            $nationality = trans('local.nationality');
            $desciption = trans('local.descr_prod');
            if ($products->isEmpty()) {
                $no_result = trans('local.no_resultsearch');

                return response()->json([0, $no_result]);
            }
            return response()->json([$products, $session_en, $name_supplier, $nationality, 4, $desciption]);

        } else {
            if (isset($array)) {
                $products = Products::whereHas('getSupplier.getUser', function ($q) use ($array) {
                    $q->whereIn('username', $array);
                })->with(['getSupplier', 'getSupplier.getUser'])->get();


                $session_en = session()->get('lang') == 'en';
                $name_supplier = trans('local.name_supplier');
                $nationality = trans('local.nationality');
                $desciption = trans('local.descr_prod');
                if ($products->isEmpty()) {
                    $no_result = trans('local.no_resultsearch');

                    return response()->json([0, $no_result]);
                }
                return response()->json([$products, $session_en, $name_supplier, $nationality, 4, $desciption]);
            } else {
                $no_result = trans('local.no_resultsearch');

                return response()->json([0, $no_result]);
            }
        }
    }


    public function search_category(Request $request)
    {
        if ($request->arr) {
            $array = $request->arr;
        }
        $cat = Category::where('name', $request->category_name)->first();
        if (isset($cat)) {

            $products = Products::whereHas('getCategories', function ($q) use ($cat) {
                $q->where('id', $cat->id);
            })->with(['getSupplier', 'getSupplier.getUser'])->get();


            $session_en = session()->get('lang') == 'en';
            $name_supplier = trans('local.name_supplier');
            $nationality = trans('local.nationality');
            $desciption = trans('local.descr_prod');
            if ($products->isEmpty()) {
                $no_result = trans('local.no_resultsearch');

                return response()->json([0, $no_result]);
            }
            return response()->json([$products, $session_en, $name_supplier, $nationality, 4, $desciption]);

        } else {
            if (isset($array)) {
//                foreach ($request->arr as $arr) {
//                    $category = Category::where('name', $arr)->first();

                $products = Products::whereHas('getCategories', function ($q) use ($request) {
                    $q->whereIn('name', $request->arr);
                })->with(['getSupplier', 'getSupplier.getUser'])->get();


                $session_en = session()->get('lang') == 'en';
                $name_supplier = trans('local.name_supplier');
                $nationality = trans('local.nationality');
                $desciption = trans('local.descr_prod');
                if ($products->isEmpty()) {
                    $no_result = trans('local.no_resultsearch');

                    return response()->json([0, $no_result]);
                }
//                }
                return response()->json([$products, $session_en, $name_supplier, $nationality, 4, $desciption]);

            } else {
                $no_result = trans('local.no_resultsearch');

                return response()->json([0, $no_result]);
            }
        }


    }

    public function search_subcategory(Request $request)
    {
        if ($request->arr) {
            $array = $request->arr;
        }
        $subcat = Category::where('name', $request->subcategory_name)->first();
        if (isset($subcat)) {

            $products = Products::where('subcategory_id', $subcat->id)->with(['getSupplier', 'getSupplier.getUser'])->get();

            $session_en = session()->get('lang') == 'en';
            $name_supplier = trans('local.name_supplier');
            $nationality = trans('local.nationality');
            $desciption = trans('local.descr_prod');
            if ($products->isEmpty()) {
                $no_result = trans('local.no_resultsearch');

                return response()->json([0, $no_result]);
            }
            return response()->json([$products, $session_en, $name_supplier, $nationality, 4, $desciption]);

        } else {
            if (isset($array)) {

                $products = Products::whereHas('getSubCategories', function ($q) use ($array) {
                    $q->whereIn('name', $array);
                })->with(['getSubCategories', 'getSupplier', 'getSupplier.getUser'])->get();

                $session_en = session()->get('lang') == 'en';
                $name_supplier = trans('local.name_supplier');
                $nationality = trans('local.nationality');
                $desciption = trans('local.descr_prod');
                if ($products->isEmpty()) {
                    $no_result = trans('local.no_resultsearch');

                    return response()->json([0, $no_result]);
                }
//                }
                return response()->json([$products, $session_en, $name_supplier, $nationality, 4, $desciption]);

            } else {
                $no_result = trans('local.no_resultsearch');

                return response()->json([0, $no_result]);
            }
        }


    }

    public function search_product(Request $request)
    {
        $products = Products::where('name', 'LIKE', "%{$request->search_pro}%")
            ->orwhereHas('getCategories', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->search_pro}%");
            })->orwhereHas('getSupplier.getUser', function ($q) use ($request) {
                $q->where('username', 'LIKE', "%{$request->search_pro}%");
            })->with(['getCategories', 'getSupplier', 'getSupplier.getUser'])->get();
        if ($products) {


            $session_en = session()->get('lang') == 'en';
            $name_supplier = trans('local.name_supplier');
            $nationality = trans('local.nationality');
            $desciption = trans('local.descr_prod');
            if ($products->isEmpty()) {
                $no_result = trans('local.no_resultsearch');

                return response()->json([0, $no_result]);
            }
            return response()->json([$products, $session_en, $name_supplier, $nationality, 4, $desciption]);

        } else {
            $no_result = trans('local.no_resultsearch');

            return response()->json([0, $no_result]);
        }


    }

    public function detail_product($name)
    {
        $product = Products::where('name', $name)->orwhere('en_name', $name)->with(['getCategories', 'getSupplier', 'getSupplier.getUser'])->first();
        $like_product = Likes::where('user_id', Auth::id())->where('product_id', $product->id)->first();
        $images = Images::where('product_id', $product->id)->get();
        $weight_pro = Products::where('name', $name)->pluck('weight_product')->toArray();
        $products_publication = Products_publication::where('product_id', $product->id)->get();
        $attribures_product = $product->attributes()->get()->toArray();
        return view('website.detail_product', compact('product', 'like_product', 'images', 'attribures_product', 'weight_pro', 'products_publication'));
    }

    public function download($attachment_pro)
    {
        $file_attach = Products_publication::where('attachment', $attachment_pro)->first();
        $file = 'uploads/' . $file_attach->attachment;

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, $file_attach->attachment, $headers);

    }

    public function share_product(Request $request)
    {
        if (!Auth::user()) {
            return response()->json(0);

        } else {
            $share_pro = SharedProduct::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
            if (isset($share_pro)) {
                return response()->json(1);
            }

            $share = new SharedProduct();
            $share->user_id = Auth::id();
            $share->product_id = $request->product_id;
            $share->save();
            return response()->json(['success' => 'true']);
        }
    }

    public function like_product(Request $request)
    {
        if (!Auth::user()) {
            return response()->json(0);

        } else {
            $like_pro = Likes::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
            if (isset($like_pro)) {
                $like_pro->delete();
                return response()->json(1);
            }

            $share = new Likes();
            $share->user_id = Auth::id();
            $share->product_id = $request->product_id;
            $share->save();
            return response()->json(['success' => 'true']);
        }
    }



}
