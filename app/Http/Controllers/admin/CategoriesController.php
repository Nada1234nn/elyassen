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

        } else {
            //remove attribute from products
            Product_attribute::where('attribute_id', $id)->delete();
            $attribute->delete();

        }


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


        $oldgroups = Attribute::where('category_id', $category['id'])->where('group_id', null)->with('attributes')->get()->toArray();

        $oldAttributes = [];
        for ($i = 0; $i < count($oldgroups); $i++) {
            $oldAttributes[$i] = $oldgroups[$i]['attributes'];
        }

        $names = [];
        $v = 0;
        foreach ($oldAttributes as $index => $oldAttribute) {
            foreach ($oldAttribute as $value) {
                $names[$v] = $value;
                $v++;
            }
        }

        $groupAttributeKeys = [];
        $x = 0;
        foreach ($groups as $group) {
            if (array_key_exists('group_id', $group)) {
                foreach ($group['attribute_key'] as $groupIndex => $attribute_key) {
                    $groupAttributeKeys[$x]['group_id'] = $group['group_id'];
                    $groupAttributeKeys[$x][$groupIndex] = $attribute_key;
                }
            }
            $x++;
        }
        if (count($groupAttributeKeys) >= count($oldAttributes)) {

            $groupAttributeKeyValues = [];
            foreach ($groupAttributeKeys as $index => $groupAttributeKey) {
                $groupAttributeKeyValues[$index] = array_values($groupAttributeKey);
            }
            $oldValues = array_merge(array_column($names, 'name'), array_column($names, 'en_name'), array_column($names, 'group_id'));
            $newAttributes = array_diff(array_values(call_user_func_array('array_merge', $groupAttributeKeyValues)), array_values($oldValues));

//            foreach ($newAttributes as $newAttribute){
//            if (($key = in_array(null, $newAttribute)) !== false) {
//
//                unset($newAttribute[$key]);
//                dd($newAttribute);
//            }
//            $arr = array_chunk($newAttribute, 2);
//            dd($arr);
//}

            if (count(call_user_func_array("array_merge", $groupAttributeKeyValues)) > count(array_values(array_unique($oldValues)))) {
                if (count($newAttributes)) {
                    $news = array('attributekey' => $newAttributes);
                    $news_attribute = array('attribute_key' => $news);
                    foreach ($newAttributes as $z => $newAttribute) {

                        foreach ($groupAttributeKeys as $groupAttributeKey) {
                            if (in_array($newAttribute, $groupAttributeKey)) {
                                $group_id = $groupAttributeKey['group_id'];
                            }
                        }
                        foreach ($news_attribute['attribute_key'] as $new_attribute) {
                            foreach (array_keys($newAttributes, null) as $newAttribute) {
                                unset($newAttributes[$newAttribute]);

                            }
                            $arrs = array_chunk($newAttributes, 2);
                            foreach ($arrs as $arr) {
                                $new_attributee = Attribute::create([
                                    'category_id' => $category['id'],
                                    'name' => $arr[0],
                                    'group_id' => $group_id
                                ]);
                                $attribute = Attribute::find($new_attributee->id);
                                $attribute->en_name = $arr[1];
                                $attribute->save();
                            }
                        }
                    }


                }
            } elseif (count(call_user_func_array("array_merge", $groupAttributeKeyValues)) == count(array_values(array_unique($oldValues)))) {
                foreach ($oldgroups as $index => $old) {
                    if ($groups[$index]['attribute'] != $old['name']) {
                        $object = Attribute::find($old['id']);
                        $object->name = $groups[$index]['attribute'];
                        $object->en_name = $groups[$index]['attribute'];
                        $object->save();
                    }

                    $i = 0;
                    if (array_key_exists('attribute_key', $groups[$index])) {
//                            foreach ($groups[$index]['attribute_key'] as $key) {
//                                if ($key == $oldgroups[$index]['attributes'][$i]['name']) {
                        $object = Attribute::find($oldgroups[$index]['attributes'][$i]['id']);
                        $object->name = $groups[$index]['attribute_key'][0];
                        $object->en_name = $groups[$index]['attribute_key'][1];
                        $object->save();
//                                }
                        $i++;
//                            }
                    }

                }
            }
        }
//        if (count($groups) > count($oldgroups)) {
//
//            $newGroups = array_diff_key($groups, $oldgroups);
//            foreach ($newGroups as $newGroup) {
//                dd($newGroups);
//                $newAttribute = Attribute::create([
//                    "category_id" => $category['id'],
//                    "name" => $newGroups['attribute'][1],
//                    "en_name" => $newGroups['attribute'][0],
//                    "group_id" => null
//                ]);
//
//                if (array_key_exists('attribute_key', $newGroup)) {
//
//                    $newAttributeKeys = array_filter($newGroup['attribute_key']);
//
//                    if (!empty($newAttributeKeys)) {
//                        foreach ($newAttributeKeys as $key => $newAttributeKey) {
//
//                            $attributes = Attribute::create([
//                                "category_id" => $category['id'],
//                                "name" => $newAttributeKeys[0],
//                                "en_name" => $newAttributeKey[1],
//                                "group_id" => $newAttribute['id']
//                            ]);
//                        }
//                    }
//                }
//            }
//        }



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
        return response()->json(['success'=>'true']);
    }
}
