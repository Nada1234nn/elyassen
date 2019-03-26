<?php

namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categories = Category::all()->where('parent_id', null);
            return view('admin.categories.index', compact('categories'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('kk');
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        $category= Category::create([
            'ar_name' => $request->ar_name,
            'type' =>1,
            'pending_cat' => $request->pending_cat ? 1 : 0
        ]);

        if ($request->en_name){
            $this->validate($request, [
                'en_name' => 'unique:categories|max:100|min:3',
            ]);
            $category->update([
                'en_name'=>$request->en_name
            ]);
        }
        if ($request->icon){
            $category->update([
                'image'=>$request->icon
            ]);

        }
        $cities=$request->city;

        if ($request->city[0]=='all')
        {
            $cities=City::where('type',1)->get();
            foreach ($cities as $city){
                $cat_city=new Category_city();
                $cat_city->category_id=$category->id;
                $cat_city->city_id=$city->id;
                $cat_city->save();
            }
        }
        else{

            foreach ($cities as $city){
                $cat_city=new Category_city();
                $cat_city->category_id=$category->id;
                $cat_city->city_id=$city;
                $cat_city->save();
            }
        }
        return redirect('/admin/categories/create')
            ->with('success', 'تم انشاء القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $categories = Category::where('parent_id', $id)->get();
        $count=$categories->count();
        $latestCat= Category::where('parent_id', $id)->whereDate('created_at', '=', Carbon::today()->toDateString())->count();

        return view('admin.categories.childs', compact('category', 'categories', 'count', 'latestCat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all()->where('parent_id', null);
        $cities=City::where('type',1)->get();
        return view('admin.categories.single', compact('category', 'categories','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $this->validate($request, [
            'ar_name' => 'sometimes',
            'en_name' => 'sometimes',
            'city' => 'required',
//            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);
        if ($request->get('ar_name') != '') {
            $category->ar_name = $request->get('ar_name');
        }
        if ($request->get('en_name') != '') {
            $category->en_name = $request->get('en_name');
        }
        if ($request->get('icon') != '') {
            $category->image = $request->get('icon');
        }
//        if ($request->hasFile('image')) {
//            $imageName = str_random(4) . $request->file('image')->getClientOriginalName();
//            $old_file = '/public/images/categories/' .$category->image;
//            if (is_file($old_file)) unlink($old_file);
//            $request->file('image')->move(
//                base_path() . '/public/images/categories/', $imageName
//            );
//            $category->image = $imageName;
//        }
        if($request->pending_cat)
            $category->pending_cat = 1;
        else
            $category->pending_cat = 0;
        $category->save();
        $category->city()->detach();
        $cities=$request->city;
        if ($request->city[0]=='all')
        {
            $cities=City::where('type',1)->get();
            foreach ($cities as $city){
                $cat_city=new Category_city();
                $cat_city->category_id=$category->id;
                $cat_city->city_id=$city->id;
                $cat_city->save();
            }
        }
        else{
            foreach ($cities as $city){
                $cat_city=new Category_city();
                $cat_city->category_id=$category->id;
                $cat_city->city_id=$city;
                $cat_city->save();

            }

        }

        return redirect('/admin/categories')
            ->with('success', 'تم تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $category = Category::find($id);
//        $image='images/categories/'.$category->image;
//        if(is_file($image))	unlink($image);
        Category::where('parent_id', $id)->delete();
        Category::destroy($id);
    }
}
