<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = Category::all()->where('parent_id', '!=', null);
        return view('admin.subcategories.index', compact('sub_categories'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->where('parent_id', null);
        return view('admin.subcategories.subcategory', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'en_name' => 'unique:categories|max:100|min:3',

        ]);
        $category = new Category();
        $parent_name = $request->parent_id;
        $parent = Category::find($parent_name);
        $category->name = $request->name;
        $category->en_name = $request->en_name;
        $category->parent_id = $parent_name;
        $type = $parent->type;
        $category->type = $type + 1;
        $category->save();


        return redirect('/subcategories')
            ->with('success', 'تم انشاء القسم الفرعي بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($name)
//    {
//        $category = Category::where('name',$name)->first();
//
//        $sub_categories = Category::where('parent_id', $category->id)->get();
//
//        return view('admin.categories.subcategory_index', compact('category', 'sub_categories'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category = Category::find($id);
        $categories = Category::all()->where('parent_id', null);

        return view('admin.subcategories.subcategory', compact('sub_category', 'categories'));
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
        $this->validate($request, [
            'name' => 'unique:categories',
            'en_name' => 'unique:categories|max:100|min:3',

        ]);
        $subcategory = Category::find($id);
        $subcategory->name = $request->name;
        $subcategory->en_name = $request->en_name;
        $parent_name = $request->parent_id;
        $subcategory->parent_id = $parent_name;
        $parent = Category::find($parent_name);
        $type = $parent->type;
        $subcategory->type = $type + 1;
        $subcategory->save();

        return redirect('/subcategories')
            ->with('success', 'تم تعديل القسم الفرعي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
