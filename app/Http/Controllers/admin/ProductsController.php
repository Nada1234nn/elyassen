<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Permissions;
use App\Models\Products;
use App\Models\Suppliers;
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
        $suppliers = Suppliers::with('getUser')->get();
        $categories = Category::where('parent_id', null)->get();
        return view('admin.products.product', compact('suppliers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
//        $this->validate($request, [
//
//
//        ]);
        if ($request->name_v_pro || $request->supplier_v_pro || $request->attachents_v_pro || $request->category_v_pro || $request->subphotos_v_pro || $request->mainphoto_v_pro || $request->descr_v_pro || $request->sorting_v_pro || $request->weight_v_pro || $request->fill_v_pro || $request->color_v_pro || $request->organic_v_pro || $request->freesugar_v_pro || $request->freelactose_v_pro || $request->underexpire_v_pro || $request->attribute_category_v_pro) {
            $role_v = Permissions::where('name', 'visitor')->first();
            $role_v->name_pro = isset($request->name_v_pro) ? $request->name_v_pro : 0;
            $role_v->supplier_pro = isset($request->supplier_v_pro) ? $request->supplier_v_pro : 0;
            $role_v->category_pro = isset($request->category_v_pro) ? $request->category_v_pro : 0;
            $role_v->descr_pro = isset($request->descr_v_pro) ? $request->descr_v_pro : 0;
            $role_v->sorting_pro = isset($request->sorting_v_pro) ? $request->sorting_v_pro : 0;
            $role_v->weight_pro = isset($request->weight_v_pro) ? $request->weight_v_pro : 0;
            $role_v->fill_pro = isset($request->fill_v_pro) ? $request->fill_v_pro : 0;
            $role_v->color_pro = isset($request->color_v_pro) ? $request->color_v_pro : 0;
            $role_v->organic_pro = isset($request->organic_v_pro) ? $request->organic_v_pro : 0;
            $role_v->freesugar_pro = isset($request->freesugar_v_pro) ? $request->freesugar_v_pro : 0;
            $role_v->freelactose_pro = isset($request->freelactose_v_pro) ? $request->freelactose_v_pro : 0;
            $role_v->underexpire_pro = isset($request->underexpire_v_pro) ? $request->underexpire_v_pro : 0;
            $role_v->attribute_category = isset($request->attribute_category_v_pro) ? $request->attribute_category_v_pro : 0;
            $role_v->mainphoto_pro = isset($request->mainphoto_v_pro) ? $request->mainphoto_v_pro : 0;
            $role_v->subphotos_pro = isset($request->subphotos_v_pro) ? $request->subphotos_v_pro : 0;
            $role_v->attachents_pro = isset($request->attachents_v_pro) ? $request->attachents_v_pro : 0;
            $role_v->save();
        }

        if ($request->name_c_pro || $request->supplier_c_pro || $request->subphotos_c_pro || $request->attachents_c_pro || $request->category_c_pro || $request->mainphoto_c_pro || $request->descr_c_pro || $request->sorting_c_pro || $request->weight_c_pro || $request->fill_c_pro || $request->color_c_pro || $request->organic_c_pro || $request->freesugar_c_pro || $request->freelactose_c_pro || $request->underexpire_c_pro || $request->attribute_category_c_pro) {
            $role_c = Permissions::where('name', 'customer')->first();
            $role_c->name_pro = isset($request->name_c_pro) ? $request->name_c_pro : 0;
            $role_c->supplier_pro = isset($request->supplier_c_pro) ? $request->supplier_c_pro : 0;
            $role_c->category_pro = isset($request->category_c_pro) ? $request->category_c_pro : 0;
            $role_c->descr_pro = isset($request->descr_c_pro) ? $request->descr_c_pro : 0;
            $role_c->sorting_pro = isset($request->sorting_c_pro) ? $request->sorting_c_pro : 0;
            $role_c->weight_pro = isset($request->weight_c_pro) ? $request->weight_c_pro : 0;
            $role_c->fill_pro = isset($request->fill_c_pro) ? $request->fill_c_pro : 0;
            $role_c->color_pro = isset($request->color_c_pro) ? $request->color_c_pro : 0;
            $role_c->organic_pro = isset($request->organic_c_pro) ? $request->organic_c_pro : 0;
            $role_c->freesugar_pro = isset($request->freesugar_c_pro) ? $request->freesugar_c_pro : 0;
            $role_c->freelactose_pro = isset($request->freelactose_c_pro) ? $request->freelactose_c_pro : 0;
            $role_c->underexpire_pro = isset($request->underexpire_c_pro) ? $request->underexpire_c_pro : 0;
            $role_c->attribute_category = isset($request->attribute_category_c_pro) ? $request->attribute_category_c_pro : 0;
            $role_c->mainphoto_pro = isset($request->mainphoto_c_pro) ? $request->mainphoto_c_pro : 0;
            $role_c->subphotos_pro = isset($request->subphotos_c_pro) ? $request->subphotos_c_pro : 0;
            $role_c->attachents_pro = isset($request->attachents_c_pro) ? $request->attachents_c_pro : 0;
            $role_c->save();
        }
        if ($request->name_s_pro || $request->supplier_s_pro || $request->category_s_pro || $request->attachents_s_pro || $request->subphotos_s_pro || $request->mainphoto_s_pro || $request->descr_s_pro || $request->sorting_s_pro || $request->weight_s_pro || $request->fill_s_pro || $request->color_s_pro || $request->organic_s_pro || $request->freesugar_s_pro || $request->freelactose_s_pro || $request->underexpire_s_pro || $request->attribute_category_s_pro) {
            $role_s = Permissions::where('name', 'suppliers')->first();
            $role_s->name_pro = isset($request->name_s_pro) ? $request->name_s_pro : 0;
            $role_s->supplier_pro = isset($request->supplier_s_pro) ? $request->supplier_s_pro : 0;
            $role_s->category_pro = isset($request->category_s_pro) ? $request->category_s_pro : 0;
            $role_s->descr_pro = isset($request->descr_s_pro) ? $request->descr_s_pro : 0;
            $role_s->sorting_pro = isset($request->sorting_s_pro) ? $request->sorting_s_pro : 0;
            $role_s->weight_pro = isset($request->weight_s_pro) ? $request->weight_s_pro : 0;
            $role_s->fill_pro = isset($request->fill_s_pro) ? $request->fill_s_pro : 0;
            $role_s->color_pro = isset($request->color_s_pro) ? $request->color_s_pro : 0;
            $role_s->organic_pro = isset($request->organic_s_pro) ? $request->organic_s_pro : 0;
            $role_s->freesugar_pro = isset($request->freesugar_s_pro) ? $request->freesugar_s_pro : 0;
            $role_s->freelactose_pro = isset($request->freelactose_s_pro) ? $request->freelactose_s_pro : 0;
            $role_s->underexpire_pro = isset($request->underexpire_s_pro) ? $request->underexpire_s_pro : 0;
            $role_s->attribute_category = isset($request->attribute_category_s_pro) ? $request->attribute_category_s_pro : 0;
            $role_s->mainphoto_pro = isset($request->mainphoto_s_pro) ? $request->mainphoto_s_pro : 0;
            $role_s->subphotos_pro = isset($request->subphotos_s_pro) ? $request->subphotos_s_pro : 0;
            $role_s->attachents_pro = isset($request->attachents_s_pro) ? $request->attachents_s_pro : 0;
            $role_s->save();
        }
        if ($request->name_e_pro || $request->supplier_e_pro || $request->category_e_pro || $request->attachents_e_pro || $request->subphotos_e_pro || $request->mainphoto_e_pro || $request->sorting_e_pro || $request->weight_e_pro || $request->fill_e_pro || $request->color_e_pro || $request->organic_e_pro || $request->freesugar_e_pro || $request->freelactose_e_pro || $request->underexpire_e_pro || $request->attribute_category_e_pro) {
            $role_e = Permissions::where('name', 'employees')->first();
            $role_e->name_pro = isset($request->name_e_pro) ? $request->name_e_pro : 0;
            $role_e->supplier_pro = isset($request->supplier_e_pro) ? $request->supplier_e_pro : 0;
            $role_e->category_pro = isset($request->category_e_pro) ? $request->category_e_pro : 0;
            $role_e->descr_pro = isset($request->descr_e_pro) ? $request->descr_e_pro : 0;
            $role_e->sorting_pro = isset($request->sorting_e_pro) ? $request->sorting_e_pro : 0;
            $role_e->weight_pro = isset($request->weight_e_pro) ? $request->weight_e_pro : 0;
            $role_e->fill_pro = isset($request->fill_e_pro) ? $request->fill_e_pro : 0;
            $role_e->color_pro = isset($request->color_e_pro) ? $request->color_e_pro : 0;
            $role_e->organic_pro = isset($request->organic_e_pro) ? $request->organic_e_pro : 0;
            $role_e->freesugar_pro = isset($request->freesugar_e_pro) ? $request->freesugar_e_pro : 0;
            $role_e->freelactose_pro = isset($request->freelactose_e_pro) ? $request->freelactose_e_pro : 0;
            $role_e->underexpire_pro = isset($request->underexpire_e_pro) ? $request->underexpire_e_pro : 0;
            $role_e->attribute_category = isset($request->attribute_category_e_pro) ? $request->attribute_category_e_pro : 0;
            $role_e->mainphoto_pro = isset($request->mainphoto_e_pro) ? $request->mainphoto_e_pro : 0;
            $role_e->subphotos_pro = isset($request->subphotos_e_pro) ? $request->subphotos_e_pro : 0;
            $role_e->attachents_pro = isset($request->attachents_e_pro) ? $request->attachents_e_pro : 0;

            $role_e->save();
        }

        dd(';;');
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
