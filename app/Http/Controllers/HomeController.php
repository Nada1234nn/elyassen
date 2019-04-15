<?php

namespace App\Http\Controllers;

use App\Contact_us;
use App\Emails;
use App\Models\Category;
use App\Models\Images;
use App\Models\Likes;
use App\Models\News;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Products_order;
use App\Models\Products_publication;
use App\Models\SharedProduct;
use App\Models\Suppliers;
use App\Models\Systems;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $sliders_news = News::where('slider', '1')->get();
        $categories = Category::all()->where('parent_id', '!=', 'null');
        $lastest_news = News::where('last_news', 1)->orderby('created_at', 'DESC')->get();
        return view('website.home', compact('sliders_news', 'categories', 'lastest_news'));
    }

    public function search_pro($name)
    {
        $search_products = Products::whereHas('getCategories', function ($q) use ($name) {
            $q->where('name', $name);
        })->with(['getCategories', 'getSupplier', 'getSupplier.getUser'])->get();
        $suppliers = Suppliers::all();
        $categories = Category::where('parent_id', null)->get();
        $subcategories = Category::where('parent_id', '!=', null)->get();
        return view('website.products', compact('search_products', 'suppliers', 'categories', 'subcategories'));
    }

    public function detail_news($title)
    {
        $news = News::where('title', $title)->first();
        $result = News::select(DB::raw('YEAR(created_at) year'))->distinct()->get();
//    $result_m = News::select(DB::raw(' MONTH(created_at) month'))->distinct()->get();
//    $months=$result_m->pluck('month');
        $years = $result->pluck('year');
        $lastest_news = News::where('id', '!=', $news->id)->where('last_news', 1)->orderby('created_at', 'DESC')->take(2)->get();
        return view('website.detail_news', compact('news', 'lastest_news', 'years'));
    }

    public function search_news(Request $request)
    {
        $search_news = News::where('title', 'LIKE', "%{$request->search}%")->first();
        $result = News::select(DB::raw('YEAR(created_at) year'))->distinct()->get();

        $years = $result->pluck('year');
        if (isset($search_news)) {
            $lastest_news = News::where('id', '!=', $search_news->id)->where('last_news', 1)->orderby('created_at', 'DESC')->take(2)->get();
        } else {
            $lastest_news = News::where('last_news', 1)->orderby('created_at', 'DESC')->take(2)->get();

        }

        return view('website.detail_news', compact('years', 'search_news', 'lastest_news'));
    }

    public function search_title(Request $request)
    {
        dd($request);
        $search_news = News::where('title', 'LIKE', "%{$request->search}%")->first();
        $result = News::select(DB::raw('YEAR(created_at) year'))->distinct()->get();

        $years = $result->pluck('year');
        if (isset($search_news)) {
            $lastest_news = News::where('id', '!=', $search_news->id)->where('last_news', 1)->orderby('created_at', 'DESC')->take(2)->get();
        } else {
            $lastest_news = News::where('last_news', 1)->orderby('created_at', 'DESC')->take(2)->get();

        }

        return view('website.detail_news', compact('years', 'search_news', 'lastest_news'));
    }

    public function suppliers()
    {
        $suppliers = Suppliers::with('getUser')->get();
        return view('website.suppliers', compact('suppliers'));
    }

    public function news()
    {
        $lastest_news = News::where('last_news', 1)->orderby('created_at', 'DESC')->get();
        $result = News::select(DB::raw('YEAR(created_at) year'))->distinct()->get();
//    $result_m = News::select(DB::raw(' MONTH(created_at) month'))->distinct()->get();
//    $months=$result_m->pluck('month');
        $years = $result->pluck('year');


        return view('website.news', compact('lastest_news', 'years'));
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
            $q->where('username', 'LIKE', "%{$request->supplier_id}%");

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
                    $q->whereIn('username', 'LIKE', "%{$array}%");
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

    public function search_prosupplier(Request $request)
    {
        $supplier = Suppliers::whereHas('getUser', function ($q) use ($request) {
            $q->where('username', 'LIKE', "%{$request->supplier_name}%");

        })->with('getUser')->first();
        if ($request->arr) {
            $array = $request->arr;
        }


        if (isset($supplier)) {
            $product = Products::where('supplier_id', $supplier->id)->with(['getCategories', 'getSupplier', 'getSupplier.getUser'])->first();

            if (isset($product)) {
                $session_en = session()->get('lang') == 'en';
                $per_name = Auth::user() && Auth::user()->can('pro_name_' . $product->id);
                $visitor = \App\Role::where('name', 'visitor')->first();
                $v_per_name = !Auth::user() && $visitor->hasPermission('pro_name_' . $product->id);
                $admin_per_name = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $per_supplier = Auth::user() && Auth::user()->can('supplier_pro_' . $product->id);
                $by = trans('local.with');
                $v_per_supplier = !Auth::user() && $visitor->hasPermission('supplier_pro' . $product->id);
                $admin_per_supplier = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $like = isset($like_product) && Likes::where('user_id', Auth::id())->where('product_id', $product->id)->first();
                $per_subphotos = Auth::user() && Auth::user()->can('subphotos_pro_' . $product->id);
                $images = Images::where('product_id', $product->id)->get();
                $v_per_subphotos = !Auth::user() && $visitor->hasPermission('subphotos_pro_' . $product->id);
                $admin_per_subphotos = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $total_size = trans('local.total_size');
                $gm = trans('local.gm');
                $auth_user = Auth::user();
                $order_pro = trans('local.order_product');
                $information_add = trans('local.information_additional');
                $per_attach = Auth::user() && Auth::user()->can('attach_pro_' . $product->id);
                $products_publication = Products_publication::where('product_id', $product->id)->get();
                $technical_sheet = trans('local.technical_sheet');
                $v_per_attach = !Auth::user() && $visitor->hasPermission('attach_pro_' . $product->id);
                $admin_per_attach = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $information_pro = trans('local.information_product');
                $descr = trans('local.description');
                $per_descr = Auth::user() && Auth::user()->can('descr_pro_' . $product->id);
                $v_per_descr = !Auth::user() && $visitor->hasPermission('descr_pro_' . $product->id);
                $admin_per_descr = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $descr_pro = trans('local.descriptions_pro');
                $per_attributecat = Auth::user() && Auth::user()->can('attribute_category_pro_' . $product->id);
                $attribures_product = $product->attributes()->get()->toArray();
                $v_per_attributecat = !Auth::user() && $visitor->hasPermission('attribute_category_pro_' . $product->id);
                $admin_per_attributecat = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $trade_mark = trans('local.trade_mark');
                $per_cat = Auth::user() && Auth::user()->can('cat_pro_' . $product->id);
                $type = trans('local.type');
                $v_per_cat = !Auth::user() && $visitor->hasPermission('cat_pro_' . $product->id);
                $per_weight = Auth::user() && Auth::user()->can('weight_pro_' . $product->id);
                $v_per_weight = !Auth::user() && $visitor->hasPermission('weight_pro_' . $product->id);
                $per_fill = Auth::user() && Auth::user()->can('fill_pro_' . $product->id);
                $fill_pro = trans('local.fill_product');
                $v_per_fill = !Auth::user() && $visitor->hasPermission('fill_pro_' . $product->id);
                $per_organic = Auth::user() && Auth::user()->can('organic_pro_' . $product->id);
                $organic = trans('local.organic');
                $v_per_organic = !Auth::user() && $visitor->hasPermission('organic_pro_' . $product->id);
                $per_freesugar = Auth::user() && Auth::user()->can('freesugar_' . $product->id);
                $freesugar = trans('local.free_sugar');
                $v_per_freesugar = !Auth::user() && $visitor->hasPermission('freesugar_' . $product->id);
                $per_freelactose = Auth::user() && Auth::user()->can('freelactose_pro_' . $product->id);
                $freelactose = trans('local.free_lactose');
                $v_per_freelactose = !Auth::user() && $visitor->hasPermission('freelactose_pro_' . $product->id);
                $per_underexpire = Auth::user() && Auth::user()->can('underexpire_pro_' . $product->id);
                $underexpire = trans('local.underexpire_pro');
                $v_per_underexpire = !Auth::user() && $visitor->hasPermission('underexpire_pro_' . $product->id);
                $token = csrf_token();
                return response()->json(
                    [1, $product, $session_en, $per_name, $v_per_name, $admin_per_name, $per_supplier, $by, $v_per_supplier, $admin_per_supplier, $like,
                        $per_subphotos, $images, $v_per_subphotos, $admin_per_subphotos, $total_size, $gm, $auth_user, $order_pro, $information_add,
                        $per_attach, $products_publication, $technical_sheet, $v_per_attach, $admin_per_attach, $information_pro, $descr, $per_descr,
                        $v_per_descr, $admin_per_descr, $descr_pro, $per_attributecat, $attribures_product, $v_per_attributecat, $admin_per_attributecat
                        , $trade_mark, $per_cat, $type, $v_per_cat, $per_weight, $v_per_weight, $per_fill, $fill_pro, $v_per_fill, $per_organic, $organic,
                        $v_per_organic, $per_freesugar, $freesugar, $v_per_freesugar, $per_freelactose, $freelactose, $v_per_freelactose,
                        $per_underexpire, $underexpire, $v_per_underexpire, $token]);
            }
        } else {
            if (isset($array)) {
                $product = Products::whereHas('getSupplier.getUser', function ($q) use ($array) {
                    $q->whereIn('username', 'LIKE', "%{$array}%");
                })->with(['getCategories', 'getSupplier', 'getSupplier.getUser'])->first();
                if (isset($product)) {
                    $session_en = session()->get('lang') == 'en';
                    $per_name = Auth::user() && Auth::user()->can('pro_name_' . $product->id);
                    $visitor = \App\Role::where('name', 'visitor')->first();
                    $v_per_name = !Auth::user() && $visitor->hasPermission('pro_name_' . $product->id);
                    $admin_per_name = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $per_supplier = Auth::user() && Auth::user()->can('supplier_pro_' . $product->id);
                    $by = trans('local.with');
                    $v_per_supplier = !Auth::user() && $visitor->hasPermission('supplier_pro' . $product->id);
                    $admin_per_supplier = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $like = isset($like_product) && Likes::where('user_id', Auth::id())->where('product_id', $product->id)->first();
                    $per_subphotos = Auth::user() && Auth::user()->can('subphotos_pro_' . $product->id);
                    $images = Images::where('product_id', $product->id)->get();
                    $v_per_subphotos = !Auth::user() && $visitor->hasPermission('subphotos_pro_' . $product->id);
                    $admin_per_subphotos = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $total_size = trans('local.total_size');
                    $gm = trans('local.gm');
                    $auth_user = Auth::user();
                    $order_pro = trans('local.order_product');
                    $information_add = trans('local.information_additional');
                    $per_attach = Auth::user() && Auth::user()->can('attach_pro_' . $product->id);
                    $products_publication = Products_publication::where('product_id', $product->id)->get();
                    $technical_sheet = trans('local.technical_sheet');
                    $v_per_attach = !Auth::user() && $visitor->hasPermission('attach_pro_' . $product->id);
                    $admin_per_attach = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $information_pro = trans('local.information_product');
                    $descr = trans('local.description');
                    $per_descr = Auth::user() && Auth::user()->can('descr_pro_' . $product->id);
                    $v_per_descr = !Auth::user() && $visitor->hasPermission('descr_pro_' . $product->id);
                    $admin_per_descr = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $descr_pro = trans('local.descriptions_pro');
                    $per_attributecat = Auth::user() && Auth::user()->can('attribute_category_pro_' . $product->id);
                    $attribures_product = $product->attributes()->get()->toArray();
                    $v_per_attributecat = !Auth::user() && $visitor->hasPermission('attribute_category_pro_' . $product->id);
                    $admin_per_attributecat = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $trade_mark = trans('local.trade_mark');
                    $per_cat = Auth::user() && Auth::user()->can('cat_pro_' . $product->id);
                    $type = trans('local.type');
                    $v_per_cat = !Auth::user() && $visitor->hasPermission('cat_pro_' . $product->id);
                    $per_weight = Auth::user() && Auth::user()->can('weight_pro_' . $product->id);
                    $v_per_weight = !Auth::user() && $visitor->hasPermission('weight_pro_' . $product->id);
                    $per_fill = Auth::user() && Auth::user()->can('fill_pro_' . $product->id);
                    $fill_pro = trans('local.fill_product');
                    $v_per_fill = !Auth::user() && $visitor->hasPermission('fill_pro_' . $product->id);
                    $per_organic = Auth::user() && Auth::user()->can('organic_pro_' . $product->id);
                    $organic = trans('local.organic');
                    $v_per_organic = !Auth::user() && $visitor->hasPermission('organic_pro_' . $product->id);
                    $per_freesugar = Auth::user() && Auth::user()->can('freesugar_' . $product->id);
                    $freesugar = trans('local.free_sugar');
                    $v_per_freesugar = !Auth::user() && $visitor->hasPermission('freesugar_' . $product->id);
                    $per_freelactose = Auth::user() && Auth::user()->can('freelactose_pro_' . $product->id);
                    $freelactose = trans('local.free_lactose');
                    $v_per_freelactose = !Auth::user() && $visitor->hasPermission('freelactose_pro_' . $product->id);
                    $per_underexpire = Auth::user() && Auth::user()->can('underexpire_pro_' . $product->id);
                    $underexpire = trans('local.underexpire_pro');
                    $v_per_underexpire = !Auth::user() && $visitor->hasPermission('underexpire_pro_' . $product->id);
                    $token = csrf_token();

                    return response()->json(
                        [1, $product, $session_en, $per_name, $v_per_name, $admin_per_name, $per_supplier, $by, $v_per_supplier, $admin_per_supplier, $like,
                            $per_subphotos, $images, $v_per_subphotos, $admin_per_subphotos, $total_size, $gm, $auth_user, $order_pro, $information_add,
                            $per_attach, $products_publication, $technical_sheet, $v_per_attach, $admin_per_attach, $information_pro, $descr, $per_descr,
                            $v_per_descr, $admin_per_descr, $descr_pro, $per_attributecat, $attribures_product, $v_per_attributecat, $admin_per_attributecat
                            , $trade_mark, $per_cat, $type, $v_per_cat, $per_weight, $v_per_weight, $per_fill, $fill_pro, $v_per_fill, $per_organic, $organic,
                            $v_per_organic, $per_freesugar, $freesugar, $v_per_freesugar, $per_freelactose, $freelactose, $v_per_freelactose,
                            $per_underexpire, $underexpire, $v_per_underexpire, $token]);
                } else {
                    $no_result = trans('local.no_resultsearch');

                    return response()->json([0, $no_result]);
                }
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
        $cat = Category::where('name', 'LIKE', "%{$request->category_name}%")->first();
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
                    $q->whereIn('name', 'LIKE', "%{$request->arr}%");
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

    public function searchpro_categories(Request $request)
    {
        if ($request->arr) {
            $array = $request->arr;
        }
        $cat = Category::where('name', 'LIKE', "%{$request->category_name}%")->first();
        if (isset($cat)) {

            $product = Products::whereHas('getCategories', function ($q) use ($cat) {
                $q->where('id', $cat->id);
            })->with(['getCategories', 'getSupplier', 'getSupplier.getUser'])->first();

            if (isset($product)) {
                $session_en = session()->get('lang') == 'en';
                $per_name = Auth::user() && Auth::user()->can('pro_name_' . $product->id);
                $visitor = \App\Role::where('name', 'visitor')->first();
                $v_per_name = !Auth::user() && $visitor->hasPermission('pro_name_' . $product->id);
                $admin_per_name = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $per_supplier = Auth::user() && Auth::user()->can('supplier_pro_' . $product->id);
                $by = trans('local.with');
                $v_per_supplier = !Auth::user() && $visitor->hasPermission('supplier_pro' . $product->id);
                $admin_per_supplier = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $like = isset($like_product) && Likes::where('user_id', Auth::id())->where('product_id', $product->id)->first();
                $per_subphotos = Auth::user() && Auth::user()->can('subphotos_pro_' . $product->id);
                $images = Images::where('product_id', $product->id)->get();
                $v_per_subphotos = !Auth::user() && $visitor->hasPermission('subphotos_pro_' . $product->id);
                $admin_per_subphotos = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $total_size = trans('local.total_size');
                $gm = trans('local.gm');
                $auth_user = Auth::user();
                $order_pro = trans('local.order_product');
                $information_add = trans('local.information_additional');
                $per_attach = Auth::user() && Auth::user()->can('attach_pro_' . $product->id);
                $products_publication = Products_publication::where('product_id', $product->id)->get();
                $technical_sheet = trans('local.technical_sheet');
                $v_per_attach = !Auth::user() && $visitor->hasPermission('attach_pro_' . $product->id);
                $admin_per_attach = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $information_pro = trans('local.information_product');
                $descr = trans('local.description');
                $per_descr = Auth::user() && Auth::user()->can('descr_pro_' . $product->id);
                $v_per_descr = !Auth::user() && $visitor->hasPermission('descr_pro_' . $product->id);
                $admin_per_descr = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $descr_pro = trans('local.descriptions_pro');
                $per_attributecat = Auth::user() && Auth::user()->can('attribute_category_pro_' . $product->id);
                $attribures_product = $product->attributes()->get()->toArray();
                $v_per_attributecat = !Auth::user() && $visitor->hasPermission('attribute_category_pro_' . $product->id);
                $admin_per_attributecat = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $trade_mark = trans('local.trade_mark');
                $per_cat = Auth::user() && Auth::user()->can('cat_pro_' . $product->id);
                $type = trans('local.type');
                $v_per_cat = !Auth::user() && $visitor->hasPermission('cat_pro_' . $product->id);
                $per_weight = Auth::user() && Auth::user()->can('weight_pro_' . $product->id);
                $v_per_weight = !Auth::user() && $visitor->hasPermission('weight_pro_' . $product->id);
                $per_fill = Auth::user() && Auth::user()->can('fill_pro_' . $product->id);
                $fill_pro = trans('local.fill_product');
                $v_per_fill = !Auth::user() && $visitor->hasPermission('fill_pro_' . $product->id);
                $per_organic = Auth::user() && Auth::user()->can('organic_pro_' . $product->id);
                $organic = trans('local.organic');
                $v_per_organic = !Auth::user() && $visitor->hasPermission('organic_pro_' . $product->id);
                $per_freesugar = Auth::user() && Auth::user()->can('freesugar_' . $product->id);
                $freesugar = trans('local.free_sugar');
                $v_per_freesugar = !Auth::user() && $visitor->hasPermission('freesugar_' . $product->id);
                $per_freelactose = Auth::user() && Auth::user()->can('freelactose_pro_' . $product->id);
                $freelactose = trans('local.free_lactose');
                $v_per_freelactose = !Auth::user() && $visitor->hasPermission('freelactose_pro_' . $product->id);
                $per_underexpire = Auth::user() && Auth::user()->can('underexpire_pro_' . $product->id);
                $underexpire = trans('local.underexpire_pro');
                $v_per_underexpire = !Auth::user() && $visitor->hasPermission('underexpire_pro_' . $product->id);
                $token = csrf_token();

                return response()->json([1, $product, $session_en, $per_name, $v_per_name, $admin_per_name, $per_supplier, $by, $v_per_supplier, $admin_per_supplier, $like,
                    $per_subphotos, $images, $v_per_subphotos, $admin_per_subphotos, $total_size, $gm, $auth_user, $order_pro, $information_add,
                    $per_attach, $products_publication, $technical_sheet, $v_per_attach, $admin_per_attach, $information_pro, $descr, $per_descr,
                    $v_per_descr, $admin_per_descr, $descr_pro, $per_attributecat, $attribures_product, $v_per_attributecat, $admin_per_attributecat
                    , $trade_mark, $per_cat, $type, $v_per_cat, $per_weight, $v_per_weight, $per_fill, $fill_pro, $v_per_fill, $per_organic, $organic,
                    $v_per_organic, $per_freesugar, $freesugar, $v_per_freesugar, $per_freelactose, $freelactose, $v_per_freelactose,
                    $per_underexpire, $underexpire, $v_per_underexpire, $token]);

            }
        } else {
            if (isset($array)) {


                $product = Products::whereHas('getCategories', function ($q) use ($request) {
                    $q->whereIn('name', 'LIKE', "%{$request->arr}%");
                })->with(['getCategories', 'getSupplier', 'getSupplier.getUser'])->first();

                if (isset($product)) {
                    $session_en = session()->get('lang') == 'en';
                    $per_name = Auth::user() && Auth::user()->can('pro_name_' . $product->id);
                    $visitor = \App\Role::where('name', 'visitor')->first();
                    $v_per_name = !Auth::user() && $visitor->hasPermission('pro_name_' . $product->id);
                    $admin_per_name = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $per_supplier = Auth::user() && Auth::user()->can('supplier_pro_' . $product->id);
                    $by = trans('local.with');
                    $v_per_supplier = !Auth::user() && $visitor->hasPermission('supplier_pro' . $product->id);
                    $admin_per_supplier = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $like = isset($like_product) && Likes::where('user_id', Auth::id())->where('product_id', $product->id)->first();
                    $per_subphotos = Auth::user() && Auth::user()->can('subphotos_pro_' . $product->id);
                    $images = Images::where('product_id', $product->id)->get();
                    $v_per_subphotos = !Auth::user() && $visitor->hasPermission('subphotos_pro_' . $product->id);
                    $admin_per_subphotos = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $total_size = trans('local.total_size');
                    $gm = trans('local.gm');
                    $auth_user = Auth::user();
                    $order_pro = trans('local.order_product');
                    $information_add = trans('local.information_additional');
                    $per_attach = Auth::user() && Auth::user()->can('attach_pro_' . $product->id);
                    $products_publication = Products_publication::where('product_id', $product->id)->get();
                    $technical_sheet = trans('local.technical_sheet');
                    $v_per_attach = !Auth::user() && $visitor->hasPermission('attach_pro_' . $product->id);
                    $admin_per_attach = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $information_pro = trans('local.information_product');
                    $descr = trans('local.description');
                    $per_descr = Auth::user() && Auth::user()->can('descr_pro_' . $product->id);
                    $v_per_descr = !Auth::user() && $visitor->hasPermission('descr_pro_' . $product->id);
                    $admin_per_descr = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $descr_pro = trans('local.descriptions_pro');
                    $per_attributecat = Auth::user() && Auth::user()->can('attribute_category_pro_' . $product->id);
                    $attribures_product = $product->attributes()->get()->toArray();
                    $v_per_attributecat = !Auth::user() && $visitor->hasPermission('attribute_category_pro_' . $product->id);
                    $admin_per_attributecat = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $trade_mark = trans('local.trade_mark');
                    $per_cat = Auth::user() && Auth::user()->can('cat_pro_' . $product->id);
                    $type = trans('local.type');
                    $v_per_cat = !Auth::user() && $visitor->hasPermission('cat_pro_' . $product->id);
                    $per_weight = Auth::user() && Auth::user()->can('weight_pro_' . $product->id);
                    $v_per_weight = !Auth::user() && $visitor->hasPermission('weight_pro_' . $product->id);
                    $per_fill = Auth::user() && Auth::user()->can('fill_pro_' . $product->id);
                    $fill_pro = trans('local.fill_product');
                    $v_per_fill = !Auth::user() && $visitor->hasPermission('fill_pro_' . $product->id);
                    $per_organic = Auth::user() && Auth::user()->can('organic_pro_' . $product->id);
                    $organic = trans('local.organic');
                    $v_per_organic = !Auth::user() && $visitor->hasPermission('organic_pro_' . $product->id);
                    $per_freesugar = Auth::user() && Auth::user()->can('freesugar_' . $product->id);
                    $freesugar = trans('local.free_sugar');
                    $v_per_freesugar = !Auth::user() && $visitor->hasPermission('freesugar_' . $product->id);
                    $per_freelactose = Auth::user() && Auth::user()->can('freelactose_pro_' . $product->id);
                    $freelactose = trans('local.free_lactose');
                    $v_per_freelactose = !Auth::user() && $visitor->hasPermission('freelactose_pro_' . $product->id);
                    $per_underexpire = Auth::user() && Auth::user()->can('underexpire_pro_' . $product->id);
                    $underexpire = trans('local.underexpire_pro');
                    $v_per_underexpire = !Auth::user() && $visitor->hasPermission('underexpire_pro_' . $product->id);
                    $token = csrf_token();

                    return response()->json([1, $product, $session_en, $per_name, $v_per_name, $admin_per_name, $per_supplier, $by, $v_per_supplier, $admin_per_supplier, $like,
                        $per_subphotos, $images, $v_per_subphotos, $admin_per_subphotos, $total_size, $gm, $auth_user, $order_pro, $information_add,
                        $per_attach, $products_publication, $technical_sheet, $v_per_attach, $admin_per_attach, $information_pro, $descr, $per_descr,
                        $v_per_descr, $admin_per_descr, $descr_pro, $per_attributecat, $attribures_product, $v_per_attributecat, $admin_per_attributecat
                        , $trade_mark, $per_cat, $type, $v_per_cat, $per_weight, $v_per_weight, $per_fill, $fill_pro, $v_per_fill, $per_organic, $organic,
                        $v_per_organic, $per_freesugar, $freesugar, $v_per_freesugar, $per_freelactose, $freelactose, $v_per_freelactose,
                        $per_underexpire, $underexpire, $v_per_underexpire, $token]);
                } else {
                    $no_result = trans('local.no_resultsearch');

                    return response()->json([0, $no_result]);

                }

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
        $subcat = Category::where('name', 'LIKE', "%{$request->subcategory_name}%")->first();
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
                    $q->whereIn('name', 'LIKE', "%{$array}%");
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

    public function search_prosubcategories(Request $request)
    {
        if ($request->arr) {
            $array = $request->arr;
        }
        $subcat = Category::where('name', 'LIKE', "%{$request->subcategory_name}%")->first();
        if (isset($subcat)) {

            $product = Products::where('subcategory_id', $subcat->id)->with(['getCategories', 'getSupplier', 'getSupplier.getUser'])->first();
            if (isset($product)) {
                $session_en = session()->get('lang') == 'en';
                $per_name = Auth::user() && Auth::user()->can('pro_name_' . $product->id);
                $visitor = \App\Role::where('name', 'visitor')->first();
                $v_per_name = !Auth::user() && $visitor->hasPermission('pro_name_' . $product->id);
                $admin_per_name = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $per_supplier = Auth::user() && Auth::user()->can('supplier_pro_' . $product->id);
                $by = trans('local.with');
                $v_per_supplier = !Auth::user() && $visitor->hasPermission('supplier_pro' . $product->id);
                $admin_per_supplier = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $like = isset($like_product) && Likes::where('user_id', Auth::id())->where('product_id', $product->id)->first();
                $per_subphotos = Auth::user() && Auth::user()->can('subphotos_pro_' . $product->id);
                $images = Images::where('product_id', $product->id)->get();
                $v_per_subphotos = !Auth::user() && $visitor->hasPermission('subphotos_pro_' . $product->id);
                $admin_per_subphotos = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $total_size = trans('local.total_size');
                $gm = trans('local.gm');
                $auth_user = Auth::user();
                $order_pro = trans('local.order_product');
                $information_add = trans('local.information_additional');
                $per_attach = Auth::user() && Auth::user()->can('attach_pro_' . $product->id);
                $products_publication = Products_publication::where('product_id', $product->id)->get();
                $technical_sheet = trans('local.technical_sheet');
                $v_per_attach = !Auth::user() && $visitor->hasPermission('attach_pro_' . $product->id);
                $admin_per_attach = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $information_pro = trans('local.information_product');
                $descr = trans('local.description');
                $per_descr = Auth::user() && Auth::user()->can('descr_pro_' . $product->id);
                $v_per_descr = !Auth::user() && $visitor->hasPermission('descr_pro_' . $product->id);
                $admin_per_descr = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $descr_pro = trans('local.descriptions_pro');
                $per_attributecat = Auth::user() && Auth::user()->can('attribute_category_pro_' . $product->id);
                $attribures_product = $product->attributes()->get()->toArray();
                $v_per_attributecat = !Auth::user() && $visitor->hasPermission('attribute_category_pro_' . $product->id);
                $admin_per_attributecat = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                $trade_mark = trans('local.trade_mark');
                $per_cat = Auth::user() && Auth::user()->can('cat_pro_' . $product->id);
                $type = trans('local.type');
                $v_per_cat = !Auth::user() && $visitor->hasPermission('cat_pro_' . $product->id);
                $per_weight = Auth::user() && Auth::user()->can('weight_pro_' . $product->id);
                $v_per_weight = !Auth::user() && $visitor->hasPermission('weight_pro_' . $product->id);
                $per_fill = Auth::user() && Auth::user()->can('fill_pro_' . $product->id);
                $fill_pro = trans('local.fill_product');
                $v_per_fill = !Auth::user() && $visitor->hasPermission('fill_pro_' . $product->id);
                $per_organic = Auth::user() && Auth::user()->can('organic_pro_' . $product->id);
                $organic = trans('local.organic');
                $v_per_organic = !Auth::user() && $visitor->hasPermission('organic_pro_' . $product->id);
                $per_freesugar = Auth::user() && Auth::user()->can('freesugar_' . $product->id);
                $freesugar = trans('local.free_sugar');
                $v_per_freesugar = !Auth::user() && $visitor->hasPermission('freesugar_' . $product->id);
                $per_freelactose = Auth::user() && Auth::user()->can('freelactose_pro_' . $product->id);
                $freelactose = trans('local.free_lactose');
                $v_per_freelactose = !Auth::user() && $visitor->hasPermission('freelactose_pro_' . $product->id);
                $per_underexpire = Auth::user() && Auth::user()->can('underexpire_pro_' . $product->id);
                $underexpire = trans('local.underexpire_pro');
                $v_per_underexpire = !Auth::user() && $visitor->hasPermission('underexpire_pro_' . $product->id);
                $token = csrf_token();

                return response()->json([1, $product, $session_en, $per_name, $v_per_name, $admin_per_name, $per_supplier, $by, $v_per_supplier, $admin_per_supplier, $like,
                    $per_subphotos, $images, $v_per_subphotos, $admin_per_subphotos, $total_size, $gm, $auth_user, $order_pro, $information_add,
                    $per_attach, $products_publication, $technical_sheet, $v_per_attach, $admin_per_attach, $information_pro, $descr, $per_descr,
                    $v_per_descr, $admin_per_descr, $descr_pro, $per_attributecat, $attribures_product, $v_per_attributecat, $admin_per_attributecat
                    , $trade_mark, $per_cat, $type, $v_per_cat, $per_weight, $v_per_weight, $per_fill, $fill_pro, $v_per_fill, $per_organic, $organic,
                    $v_per_organic, $per_freesugar, $freesugar, $v_per_freesugar, $per_freelactose, $freelactose, $v_per_freelactose,
                    $per_underexpire, $underexpire, $v_per_underexpire, $token]);
            } else {
                $no_result = trans('local.no_resultsearch');

                return response()->json([0, $no_result]);
            }
        } else {
            if (isset($array)) {
                $product = Products::whereHas('getSubCategories', function ($q) use ($array) {
                    $q->whereIn('name', 'LIKE', "%{$array}%");
                })->with(['getCategories', 'getSubCategories', 'getSupplier', 'getSupplier.getUser'])->first();
                if (isset($product)) {
                    $session_en = session()->get('lang') == 'en';
                    $per_name = Auth::user() && Auth::user()->can('pro_name_' . $product->id);
                    $visitor = \App\Role::where('name', 'visitor')->first();
                    $v_per_name = !Auth::user() && $visitor->hasPermission('pro_name_' . $product->id);
                    $admin_per_name = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $per_supplier = Auth::user() && Auth::user()->can('supplier_pro_' . $product->id);
                    $by = trans('local.with');
                    $v_per_supplier = !Auth::user() && $visitor->hasPermission('supplier_pro' . $product->id);
                    $admin_per_supplier = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $like = isset($like_product) && Likes::where('user_id', Auth::id())->where('product_id', $product->id)->first();
                    $per_subphotos = Auth::user() && Auth::user()->can('subphotos_pro_' . $product->id);
                    $images = Images::where('product_id', $product->id)->get();
                    $v_per_subphotos = !Auth::user() && $visitor->hasPermission('subphotos_pro_' . $product->id);
                    $admin_per_subphotos = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $total_size = trans('local.total_size');
                    $gm = trans('local.gm');
                    $auth_user = Auth::user();
                    $order_pro = trans('local.order_product');
                    $information_add = trans('local.information_additional');
                    $per_attach = Auth::user() && Auth::user()->can('attach_pro_' . $product->id);
                    $products_publication = Products_publication::where('product_id', $product->id)->get();
                    $technical_sheet = trans('local.technical_sheet');
                    $v_per_attach = !Auth::user() && $visitor->hasPermission('attach_pro_' . $product->id);
                    $admin_per_attach = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $information_pro = trans('local.information_product');
                    $descr = trans('local.description');
                    $per_descr = Auth::user() && Auth::user()->can('descr_pro_' . $product->id);
                    $v_per_descr = !Auth::user() && $visitor->hasPermission('descr_pro_' . $product->id);
                    $admin_per_descr = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $descr_pro = trans('local.descriptions_pro');
                    $per_attributecat = Auth::user() && Auth::user()->can('attribute_category_pro_' . $product->id);
                    $attribures_product = $product->attributes()->get()->toArray();
                    $v_per_attributecat = !Auth::user() && $visitor->hasPermission('attribute_category_pro_' . $product->id);
                    $admin_per_attributecat = Auth::user() && Auth::user()->role == 'admin' && Auth::User()->hasRole('admin');
                    $trade_mark = trans('local.trade_mark');
                    $per_cat = Auth::user() && Auth::user()->can('cat_pro_' . $product->id);
                    $type = trans('local.type');
                    $v_per_cat = !Auth::user() && $visitor->hasPermission('cat_pro_' . $product->id);
                    $per_weight = Auth::user() && Auth::user()->can('weight_pro_' . $product->id);
                    $v_per_weight = !Auth::user() && $visitor->hasPermission('weight_pro_' . $product->id);
                    $per_fill = Auth::user() && Auth::user()->can('fill_pro_' . $product->id);
                    $fill_pro = trans('local.fill_product');
                    $v_per_fill = !Auth::user() && $visitor->hasPermission('fill_pro_' . $product->id);
                    $per_organic = Auth::user() && Auth::user()->can('organic_pro_' . $product->id);
                    $organic = trans('local.organic');
                    $v_per_organic = !Auth::user() && $visitor->hasPermission('organic_pro_' . $product->id);
                    $per_freesugar = Auth::user() && Auth::user()->can('freesugar_' . $product->id);
                    $freesugar = trans('local.free_sugar');
                    $v_per_freesugar = !Auth::user() && $visitor->hasPermission('freesugar_' . $product->id);
                    $per_freelactose = Auth::user() && Auth::user()->can('freelactose_pro_' . $product->id);
                    $freelactose = trans('local.free_lactose');
                    $v_per_freelactose = !Auth::user() && $visitor->hasPermission('freelactose_pro_' . $product->id);
                    $per_underexpire = Auth::user() && Auth::user()->can('underexpire_pro_' . $product->id);
                    $underexpire = trans('local.underexpire_pro');
                    $v_per_underexpire = !Auth::user() && $visitor->hasPermission('underexpire_pro_' . $product->id);
                    $token = csrf_token();

//                }
                    return response()->json([1, $product, $session_en, $per_name, $v_per_name, $admin_per_name, $per_supplier, $by, $v_per_supplier, $admin_per_supplier, $like,
                        $per_subphotos, $images, $v_per_subphotos, $admin_per_subphotos, $total_size, $gm, $auth_user, $order_pro, $information_add,
                        $per_attach, $products_publication, $technical_sheet, $v_per_attach, $admin_per_attach, $information_pro, $descr, $per_descr,
                        $v_per_descr, $admin_per_descr, $descr_pro, $per_attributecat, $attribures_product, $v_per_attributecat, $admin_per_attributecat
                        , $trade_mark, $per_cat, $type, $v_per_cat, $per_weight, $v_per_weight, $per_fill, $fill_pro, $v_per_fill, $per_organic, $organic,
                        $v_per_organic, $per_freesugar, $freesugar, $v_per_freesugar, $per_freelactose, $freelactose, $v_per_freelactose,
                        $per_underexpire, $underexpire, $v_per_underexpire, $token]);
                } else {
                    $no_result = trans('local.no_resultsearch');

                    return response()->json([0, $no_result]);
                }
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
        $visitor = \App\Role::where('name', 'visitor')->first();
        $order_product = Orders::where('product_id', $product->id)->where('user_id', Auth::id())->first();
        $suppliers = Suppliers::all();
        $categories = Category::where('parent_id', null)->get();
        $subcategories = Category::where('parent_id', '!=', null)->get();
        return view('website.detail_product', compact('product', 'like_product', 'suppliers', 'categories', 'subcategories', 'visitor', 'order_product', 'images', 'attribures_product', 'weight_pro', 'products_publication'));
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

    public function save_order(Request $request)
    {
        if (!Auth::user()) {
            return response()->json(0);

        }
        $order_pro = Orders::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
        $product = Products::where('id', $request->product_id)->first();
//dd();
        $product->quantity = ($product->quantity) - ($request->qty);
        $product->save();
        if (isset($order_pro)) {
            $order_product = Orders::find($order_pro->id);
            $order_product->qty = ($order_product->qty + $request->qty);
            $order_product->save();
        } else {
            $order = new Orders();
            $order->user_id = Auth::id();
            $order->product_id = $request->product_id;
            $order->qty = $request->qty;
            $order->save();


//        return response()->json(['success' => 'true']);
        }
        return redirect()->route('website.shopping_cart', $request->product_name);

    }


    public function shopping_cart($name)
    {
        $product = Products::where('name', $name)->first();
        $order_pro = Orders::where('product_id', $product->id)->where('user_id', Auth::id())->with(['getProduct.getSupplier', 'getProduct.getSupplier.getUser'])->first();
        $images_pro = Images::where('product_id', $order_pro->product_id)->get();

        $orders = Orders::where('user_id', Auth::id())->where('product_id', '!=', $product->id)->with(['getProduct', 'getProduct.getSupplier', 'getProduct.getSupplier.getUser'])->get();


        return view('website.shopping_cart', compact('images_pro', 'order_pro', 'orders'));
    }

    public function remove_order(Request $request)
    {
        if (!Auth::user()) {
            return response()->json(0);

        } else {
            $order = Orders::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
            $order->delete();
            $riyal = trans('local.riyal');
            $total = trans('local.total');
            $collection_orders = Orders::where('user_id', Auth::id())->with(['getProduct', 'getProduct.getSupplier', 'getProduct.getSupplier.getUser'])->get();

            $totalPriceOrder = $collection_orders->sum->getSumOrderProduct();
            return response()->json([1, $riyal, $total, $totalPriceOrder]);

        }

    }

    public function order_product()
    {
        return view('website.order_product');
    }

    public function order_pro(Request $request)
    {
        if (!Auth::user()) {
            return response()->json(0);

        } else {
            $orders = Orders::where('user_id', Auth::id())->get();
            foreach ($orders as $order) {
                $product_order = new Products_order();
                $product_order->name = $request->name;
                $product_order->phone = $request->phone;
                $product_order->area = $request->area;
                $product_order->information_additional = $request->information_additional;
                $product_order->location = $request->location;
                $product_order->lat = $request->lat;
                $product_order->long = $request->lng;
                $product_order->email = $request->email;
                $product_order->status = 1;
                $product_order->order_id = $order->id;
                $file = $request->file('chooseFile');
                if ($request->hasFile('chooseFile')) {
                    $fileName = 'order_pro-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $destinationPath = 'uploads';
                    $request->file('chooseFile')->move($destinationPath, $fileName);
                    $product_order->attach = $fileName;
                }
                $product_order->save();

                $product = Products::where('id', $order->product_id)->first();
                $product->quantity = ($product->quantity - $order->qty);
                $product->save();
                $order->delete();
            }
            $riyal = trans('local.riyal');
//
            return response()->json(1, $riyal);
        }

    }

    public function update_orders(Request $request)
    {
//        dd($request->all());
//    $product=Products::where('id',$product_id)->first();
//    if ()
        for ($x = 0; $x < count($request->product_id); $x++) {
            $order = \App\Models\Orders::where([
                ['product_id', $request->product_id[$x]], ['user_id', \Auth::id()]
            ])->first();
            $order->qty = $request->quantity[$x];
            $order->save();
        }//end for
        return redirect()->route('website.order_product');


    }//end update_orders
}
