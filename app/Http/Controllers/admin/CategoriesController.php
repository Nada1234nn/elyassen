<?php

namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product_attribute;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->where('parent_id', null);
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

    public function deleteGroup($id)
    {

        $attribute = Attribute::find($id);
        if ($attribute->group_id == null) {
            foreach ($attribute->attributes as $item) {
                //remove attribute from products
                Product_attribute::where('attribute_id', $item->id)->delete();
                //delete attribute
                $item->delete();

            }

            $attribute->delete();
            return response()->json(['success' => 'true']);

        } else {
            //remove attribute from products
            Product_attribute::where('attribute_id', $id)->delete();
        }
        $attribute->delete();
        return response()->json(['success' => 'true']);

    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:categories',
            'en_name' => 'unique:categories|max:100|min:3',

        ]);
        $data = $request->all();
        $groups = $data['group'];



        $category = new Category();
        $category->name = $request->name;
        $category->en_name = $request->en_name;
        $category->type = 1;
        $category->save();


        $attribute_id = Attribute::create([
            "category_id" => $category['id'],
            "name" => 1,
            "group_id" => null
        ]);
        foreach ($groups as $group) {


            if (array_key_exists('attribute_key', $group)) {

                $attributeKeys = $group['attribute_key'];

                if (!empty($attributeKeys)) {

                    $attributes = Attribute::create([
                        "category_id" => $category['id'],
                        "name" => $attributeKeys[0],
                        "group_id" => $attribute_id['id']
                    ]);
                    $attribute = Attribute::find($attributes->id);
                    $attribute->en_name = $attributeKeys[1];
                    $attribute->save();
                }
            }

        }

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
        $category = Category::where('name',$name)->first();

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
        $category = Category::where('id', $id)->with('attributes')->first();
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
        $data = $request->all();
        $this->validate($request, [
            'name' => '',
            'en_name' => 'max:100|min:3',

        ]);
        $groups = $data['group'];
        $category = Category::find($id);
        $category->name = $request->name;
        $category->en_name = $request->en_name;
        $category->type = 1;
        $category->save();


        $oldgroups = Attribute::where('category_id', $category['id'])->where('group_id', null)->with('attributes')->first();
//
        foreach ($groups as $group) {


            if (array_key_exists('attribute_key', $group)) {

                $attributeKeys = $group['attribute_key'];

                if (!empty($attributeKeys)) {

                    $attributes = Attribute::create([
                        "category_id" => $category['id'],
                        "name" => $attributeKeys[0],
                        "group_id" => $oldgroups->id
                    ]);
                    $attribute = Attribute::find($attributes->id);
                    $attribute->en_name = $attributeKeys[1];
                    $attribute->save();
                }
            }

        }




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
        $category = Category::find($id);
        $category->delete();
        $attributes = Attribute::where('category_id', $category->id)->get();
        foreach ($attributes as $attribute) {
            $attribute->delete();
        }
        return response()->json(['success'=>'true']);
    }
}
