<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $products = Products::all();
        return view('admin.products.index', compact('products'));

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
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'en_name' => 'unique:categories|max:100|min:3',

        ]);

        Category::create([
            'name' => $request->name,
            'en_name' => $request->en_name,
            'type' => 1,
        ]);


        return redirect('/categories')
            ->with('success', 'تم انشاء القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $category = Category::where('name', $name)->first();

        $sub_categories = Category::where('parent_id', $category->id)->get();

        return view('admin.categories.subcategory_index', compact('category', 'sub_categories'));
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
        return view('admin.categories.category', compact('category'));
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

        $category = Category::find($id);
        $category->name = $request->name;
        $category->en_name = $request->en_name;
        $category->type = 1;
        $category->save();


        return redirect('/categories')
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
        Category::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
