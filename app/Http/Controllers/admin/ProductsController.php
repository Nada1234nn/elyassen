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
//        $this->validate($request, [
//
//
//        ]);
        if ($request->name_v_pro || $request->supplier_v_pro || $request->category_v_pro || $request->descr_v_pro || $request->sorting_v_pro || $request->weight_v_pro) {
            $role_v = Permissions::where('name', 'visitor')->first();
            $role_v->name_pro = isset($request->name_v_pro) ? $request->name_v_pro : 0;
            $role_v->supplier_pro = isset($request->supplier_v_pro) ? $request->supplier_v_pro : 0;
            $role_v->category_pro = isset($request->category_v_pro) ? $request->category_v_pro : 0;
            $role_v->descr_pro = isset($request->descr_v_pro) ? $request->descr_v_pro : 0;
            $role_v->sorting_pro = isset($request->sorting_v_pro) ? $request->sorting_v_pro : 0;
            $role_v->weight_pro = isset($request->weight_v_pro) ? $request->weight_v_pro : 0;
            $role_v->save();
        }
        if ($request->name_c_pro || $request->supplier_c_pro || $request->category_c_pro || $request->descr_c_pro || $request->sorting_c_pro || $request->weight_c_pro) {
            $role_c = Permissions::where('name', 'customer')->first();
            $role_c->name_pro = isset($request->name_c_pro) ? $request->name_c_pro : 0;
            $role_c->supplier_pro = isset($request->supplier_c_pro) ? $request->supplier_c_pro : 0;
            $role_c->category_pro = isset($request->category_c_pro) ? $request->category_c_pro : 0;
            $role_c->descr_pro = isset($request->descr_c_pro) ? $request->descr_c_pro : 0;
            $role_c->sorting_pro = isset($request->sorting_c_pro) ? $request->sorting_c_pro : 0;
            $role_c->weight_pro = isset($request->weight_c_pro) ? $request->weight_c_pro : 0;
            $role_c->save();
        }
        if ($request->name_s_pro || $request->supplier_s_pro || $request->category_s_pro || $request->descr_s_pro || $request->sorting_s_pro || $request->weight_s_pro) {
            $role_s = Permissions::where('name', 'suppliers')->first();
            $role_s->name_pro = isset($request->name_s_pro) ? $request->name_s_pro : 0;
            $role_s->supplier_pro = isset($request->supplier_s_pro) ? $request->supplier_s_pro : 0;
            $role_s->category_pro = isset($request->category_s_pro) ? $request->category_s_pro : 0;
            $role_s->descr_pro = isset($request->descr_s_pro) ? $request->descr_s_pro : 0;
            $role_s->sorting_pro = isset($request->sorting_s_pro) ? $request->sorting_s_pro : 0;
            $role_s->weight_pro = isset($request->weight_s_pro) ? $request->weight_s_pro : 0;
            $role_s->save();
        }
        if ($request->name_e_pro || $request->supplier_e_pro || $request->category_e_pro || $request->sorting_e_pro || $request->weight_e_pro) {
            $role_e = Permissions::where('name', 'employees')->first();
            $role_e->name_pro = isset($request->name_e_pro) ? $request->name_e_pro : 0;
            $role_e->supplier_pro = isset($request->supplier_e_pro) ? $request->supplier_e_pro : 0;
            $role_e->category_pro = isset($request->category_e_pro) ? $request->category_e_pro : 0;
            $role_e->descr_pro = isset($request->descr_e_pro) ? $request->descr_e_pro : 0;
            $role_e->sorting_pro = isset($request->sorting_e_pro) ? $request->sorting_e_pro : 0;
            $role_e->weight_pro = isset($request->weight_e_pro) ? $request->weight_e_pro : 0;

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
