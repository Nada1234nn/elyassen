<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product_attribute;
use App\Models\Products;
use App\Models\Products_publication;
use App\Models\Suppliers;
use App\Permission;
use App\Permission_role;
use App\Role;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $products = Products::with(['getCategories', 'getSupplier.getUser'])->get();
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

        $this->validate($request, [
            'name' => 'required|max:255',
            'en_name' => 'required|max:255',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'descr' => 'required',
            'descr_en' => 'required',
            'sorting' => 'required',
            'weight_product' => 'required',
            'fill_product' => 'required',
            'fill_product_en' => 'required',
            'color_product' => 'required',
            'color_product_en' => 'required',
            'organic' => 'required',
            'free_sugar' => 'required',
            'free_lactose' => 'required',
            'under_expire' => 'required',
        ]);
        $product = new Products();
        $product->name = $request->name;
        $product->en_name = $request->en_name;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->descr = $request->descr;
        $product->descr_en = $request->descr_en;
        $product->sorting = $request->sorting;
        $product->weight_product = $request->weight_product;
        $product->fill_product = $request->fill_product;
        $product->fill_product_en = $request->fill_product_en;
        $product->color_product = $request->color_product;
        $product->color_product_en = $request->color_product_en;
        $product->organic = $request->organic;
        $product->free_sugar = $request->free_sugar;
        $product->free_lactose = $request->free_lactose;
        $product->under_expire = $request->under_expire;
        $file = $request->file('main_image');
        if ($request->hasFile('main_image')) {
            $fileName = 'main_pro-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('main_image')->move($destinationPath, $fileName);
            $product->image = $fileName;
        }
        $product->save();

        $attributesIDs = $request->IDs;

        $attributesValues = $request->values;
        $attributesValues_en = $request->values_en;
        if ($attributesValues[0] == null) {
            return redirect()->back()->with('error', 'لابد من ادخال قيم المواصفات');
        }
        $attachedData = [];
        $result = array_filter($attributesIDs, function ($v) {
            return trim($v);
        });
        for ($i = 1; $i <= count($result) + 2; $i += 2) {
            $attachedData[$result[$i]] = ['attribute_value' => $attributesValues[0], 'attribute_value_en' => $attributesValues_en[1]];

        }
        $product->attributes()->attach($attachedData);


        if ($request->hasFile('productImages')) {

            $imageNames = $request->file('productImages');
            foreach ($imageNames as $name) {
                $img = "";
                $img = str_random(4) . $name->getClientOriginalName();

                $fileName = 'main_pro-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = 'uploads';
                $name->move($destinationPath, $img);
                $image = new Images();
                $image->image = $img;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        if ($request->hasFile('attachment')) {

            $attachments_file = $request->file('attachment');
            foreach ($attachments_file as $attachment_file) {

                $attachment = "";
                $attachment = str_random(4) . $attachment_file->getClientOriginalName();

                $destinationPath = 'uploads';
                $attachment_file->move($destinationPath, $attachment);
                $attach = new Products_publication();
                $attach->attachment = $attachment;
                $attach->product_id = $product->id;
                $attach->save();
            }
        }


        $name_pro = new Permission();
        $name_pro->name = 'pro_name_' . $product->id;
        $name_pro->display_name = 'Create pro_name'; // optional
// Allow a user to...
        $name_pro->description = 'create pro_name'; // optional
        $name_pro->save();

        $supplier_pro = new Permission();
        $supplier_pro->name = 'supplier_pro_' . $product->id;
        $supplier_pro->display_name = 'Create supplier_pro'; // optional
// Allow a user to...
        $supplier_pro->description = 'create supplier_pro'; // optional
        $supplier_pro->save();

        $attach_pro = new Permission();
        $attach_pro->name = 'attach_pro_' . $product->id;
        $attach_pro->display_name = 'Create attach_pro'; // optional
// Allow a user to...
        $attach_pro->description = 'create attach_pro'; // optional
        $attach_pro->save();

        $cat_pro = new Permission();
        $cat_pro->name = 'cat_pro_' . $product->id;
        $cat_pro->display_name = 'Create cat_pro'; // optional
// Allow a user to...
        $cat_pro->description = 'create cat_pro'; // optional
        $cat_pro->save();

        $subphotos_pro = new Permission();
        $subphotos_pro->name = 'subphotos_pro_' . $product->id;
        $subphotos_pro->display_name = 'Create subphotos_pro'; // optional
// Allow a user to...
        $subphotos_pro->description = 'create subphotos_pro'; // optional
        $subphotos_pro->save();

        $mainphoto_pro = new Permission();
        $mainphoto_pro->name = 'mainphoto_pro_' . $product->id;
        $mainphoto_pro->display_name = 'Create mainphoto_pro'; // optional
// Allow a user to...
        $mainphoto_pro->description = 'create mainphoto_pro'; // optional
        $mainphoto_pro->save();

        $descr_pro = new Permission();
        $descr_pro->name = 'descr_pro_' . $product->id;
        $descr_pro->display_name = 'Create descr_pro'; // optional
// Allow a user to...
        $descr_pro->description = 'create descr_pro'; // optional
        $descr_pro->save();

        $sort_pro = new Permission();
        $sort_pro->name = 'sort_pro_' . $product->id;
        $sort_pro->display_name = 'Create sort_pro'; // optional
// Allow a user to...
        $sort_pro->description = 'create sort_pro'; // optional
        $sort_pro->save();

        $weight_pro = new Permission();
        $weight_pro->name = 'weight_pro_' . $product->id;
        $weight_pro->display_name = 'Create weight_pro'; // optional
// Allow a user to...
        $weight_pro->description = 'create weight_pro'; // optional
        $weight_pro->save();

        $fill_pro = new Permission();
        $fill_pro->name = 'fill_pro_' . $product->id;
        $fill_pro->display_name = 'Create fill_pro'; // optional
// Allow a user to...
        $fill_pro->description = 'create fill_pro'; // optional
        $fill_pro->save();

        $color_pro = new Permission();
        $color_pro->name = 'color_pro_' . $product->id;
        $color_pro->display_name = 'Create color_pro'; // optional
// Allow a user to...
        $color_pro->description = 'create color_pro'; // optional
        $color_pro->save();

        $organic_pro = new Permission();
        $organic_pro->name = 'organic_pro_' . $product->id;
        $organic_pro->display_name = 'Create organic_pro'; // optional
// Allow a user to...
        $organic_pro->description = 'create organic_pro'; // optional
        $organic_pro->save();

        $freesugar = new Permission();
        $freesugar->name = 'freesugar_' . $product->id;
        $freesugar->display_name = 'Create freesugar'; // optional
// Allow a user to...
        $freesugar->description = 'create freesugar'; // optional
        $freesugar->save();

        $freelactose_pro = new Permission();
        $freelactose_pro->name = 'freelactose_pro_' . $product->id;
        $freelactose_pro->display_name = 'Create freelactose_pro'; // optional
// Allow a user to...
        $freelactose_pro->description = 'create freelactose_pro'; // optional
        $freelactose_pro->save();

        $underexpire_pro = new Permission();
        $underexpire_pro->name = 'underexpire_pro_' . $product->id;
        $underexpire_pro->display_name = 'Create underexpire_pro'; // optional
// Allow a user to...
        $underexpire_pro->description = 'create underexpire_pro'; // optional
        $underexpire_pro->save();

        $attribute_category_pro = new Permission();
        $attribute_category_pro->name = 'attribute_category_pro_' . $product->id;
        $attribute_category_pro->display_name = 'Create attribute_category_pro'; // optional
// Allow a user to...
        $attribute_category_pro->description = 'create attribute_category_pro'; // optional
        $attribute_category_pro->save();

        if ($request->name_v_pro == 1) {
            $role_v_n = Role::where('name', 'visitor')->first();
            $role_v_n->attachPermission($name_pro);

        }
        if ($request->supplier_v_pro == 1) {
            $role_v_s = Role::where('name', 'visitor')->first();
            $role_v_s->attachPermission($supplier_pro);

        }
        if ($request->attachents_v_pro == 1) {
            $role_v_attach = Role::where('name', 'visitor')->first();
            $role_v_attach->attachPermission($attach_pro);

        }
        if ($request->category_v_pro == 1) {
            $role_v_cat = Role::where('name', 'visitor')->first();
            $role_v_cat->attachPermission($cat_pro);

        }
        if ($request->subphotos_v_pro == 1) {
            $role_v_subphoto = Role::where('name', 'visitor')->first();
            $role_v_subphoto->attachPermission($subphotos_pro);

        }
        if ($request->mainphoto_v_pro == 1) {
            $role_v_mainphoto = Role::where('name', 'visitor')->first();
            $role_v_mainphoto->attachPermission($mainphoto_pro);

        }
        if ($request->descr_v_pro == 1) {
            $role_v_descr = Role::where('name', 'visitor')->first();
            $role_v_descr->attachPermission($descr_pro);

        }
        if ($request->sorting_v_pro == 1) {

            $role_v_sort = Role::where('name', 'visitor')->first();
            $role_v_sort->attachPermission($sort_pro);

        }
        if ($request->weight_v_pro == 1) {
            $role_v_weight = Role::where('name', 'visitor')->first();
            $role_v_weight->attachPermission($weight_pro);

        }
        if ($request->fill_v_pro == 1) {
            $role_v_fill = Role::where('name', 'visitor')->first();
            $role_v_fill->attachPermission($fill_pro);

        }
        if ($request->color_v_pro == 1) {
            $role_v_color = Role::where('name', 'visitor')->first();
            $role_v_color->attachPermission($color_pro);
        }
        if ($request->organic_v_pro == 1) {
            $role_v_organic = Role::where('name', 'visitor')->first();
            $role_v_organic->attachPermission($organic_pro);
        }
        if ($request->freesugar_v_pro == 1) {
            $role_v_freesugar = Role::where('name', 'visitor')->first();
            $role_v_freesugar->attachPermission($freesugar);
        }
        if ($request->freelactose_v_pro == 1) {
            $role_v_freelactose = Role::where('name', 'visitor')->first();
            $role_v_freelactose->attachPermission($freelactose_pro);
        }
        if ($request->underexpire_v_pro == 1) {
            $role_v_underexpire = Role::where('name', 'visitor')->first();
            $role_v_underexpire->attachPermission($underexpire_pro);
        }
        if ($request->attribute_category_v_pro == 1) {
            $role_v_attributecat = Role::where('name', 'visitor')->first();
            $role_v_attributecat->attachPermission($attribute_category_pro);
        }


        if ($request->name_c_pro == 1) {
            $role_c_name = Role::where('name', 'customer')->first();
            $role_c_name->attachPermission($name_pro);
        }
        if ($request->supplier_c_pro == 1) {
            $role_c_supplier = Role::where('name', 'customer')->first();
            $role_c_supplier->attachPermission($supplier_pro);
        }
        if ($request->attachents_c_pro == 1) {
            $role_c_attach = Role::where('name', 'customer')->first();
            $role_c_attach->attachPermission($attach_pro);
        }
        if ($request->category_c_pro == 1) {
            $role_c_cat = Role::where('name', 'customer')->first();
            $role_c_cat->attachPermission($cat_pro);
        }
        if ($request->subphotos_c_pro == 1) {
            $role_c_subphotos = Role::where('name', 'customer')->first();
            $role_c_subphotos->attachPermission($subphotos_pro);
        }
        if ($request->mainphoto_c_pro == 1) {
            $role_c_mainphoto = Role::where('name', 'customer')->first();
            $role_c_mainphoto->attachPermission($mainphoto_pro);
        }
        if ($request->descr_c_pro == 1) {
            $role_c_descr = Role::where('name', 'customer')->first();
            $role_c_descr->attachPermission($descr_pro);
        }
        if ($request->sorting_c_pro == 1) {
            $role_c_sort = Role::where('name', 'customer')->first();
            $role_c_sort->attachPermission($sort_pro);
        }
        if ($request->weight_c_pro == 1) {
            $role_c_weight = Role::where('name', 'customer')->first();
            $role_c_weight->attachPermission($weight_pro);
        }
        if ($request->fill_c_pro == 1) {
            $role_c_fill = Role::where('name', 'customer')->first();
            $role_c_fill->attachPermission($fill_pro);
        }
        if ($request->color_c_pro == 1) {
            $role_c_color = Role::where('name', 'customer')->first();
            $role_c_color->attachPermission($color_pro);
        }
        if ($request->organic_c_pro == 1) {
            $role_c_organic = Role::where('name', 'customer')->first();
            $role_c_organic->attachPermission($organic_pro);
        }
        if ($request->freesugar_c_pro == 1) {
            $role_c_freesugar = Role::where('name', 'customer')->first();
            $role_c_freesugar->attachPermission($freesugar);
        }
        if ($request->freelactose_c_pro == 1) {
            $role_c_freelactose = Role::where('name', 'customer')->first();
            $role_c_freelactose->attachPermission($freelactose_pro);
        }
        if ($request->underexpire_c_pro == 1) {
            $role_c_underexpire = Role::where('name', 'customer')->first();
            $role_c_underexpire->attachPermission($underexpire_pro);
        }
        if ($request->attribute_category_c_pro == 1) {
            $role_c_attributecat = Role::where('name', 'customer')->first();
            $role_c_attributecat->attachPermission($attribute_category_pro);
        }


        if ($request->name_s_pro == 1) {
            $role_s_name = Role::where('name', 'suppliers')->first();
            $role_s_name->attachPermission($name_pro);
        }
        if ($request->supplier_s_pro == 1) {
            $role_s_supplier = Role::where('name', 'suppliers')->first();
            $role_s_supplier->attachPermission($supplier_pro);
        }
        if ($request->attachents_s_pro == 1) {
            $role_s_attach = Role::where('name', 'suppliers')->first();
            $role_s_attach->attachPermission($attach_pro);
        }
        if ($request->category_s_pro == 1) {
            $role_s_category = Role::where('name', 'suppliers')->first();
            $role_s_category->attachPermission($cat_pro);
        }
        if ($request->subphotos_s_pro == 1) {
            $role_s_subphotos = Role::where('name', 'suppliers')->first();
            $role_s_subphotos->attachPermission($subphotos_pro);
        }
        if ($request->mainphoto_s_pro == 1) {
            $role_s_mainphoto = Role::where('name', 'suppliers')->first();
            $role_s_mainphoto->attachPermission($mainphoto_pro);
        }
        if ($request->descr_s_pro == 1) {
            $role_s_descr = Role::where('name', 'suppliers')->first();
            $role_s_descr->attachPermission($descr_pro);
        }
        if ($request->sorting_s_pro == 1) {
            $role_s_sort = Role::where('name', 'suppliers')->first();
            $role_s_sort->attachPermission($sort_pro);
        }
        if ($request->weight_s_pro == 1) {
            $role_s_weight = Role::where('name', 'suppliers')->first();
            $role_s_weight->attachPermission($weight_pro);
        }
        if ($request->fill_s_pro == 1) {
            $role_s_fill = Role::where('name', 'suppliers')->first();
            $role_s_fill->attachPermission($fill_pro);
        }
        if ($request->color_s_pro == 1) {
            $role_s_color = Role::where('name', 'suppliers')->first();
            $role_s_color->attachPermission($color_pro);
        }
        if ($request->organic_s_pro == 1) {
            $role_s_organic = Role::where('name', 'suppliers')->first();
            $role_s_organic->attachPermission($organic_pro);
        }
        if ($request->freesugar_s_pro == 1) {
            $role_s_freesugar = Role::where('name', 'suppliers')->first();
            $role_s_freesugar->attachPermission($freesugar);
        }
        if ($request->freelactose_s_pro == 1) {
            $role_s_freelactose = Role::where('name', 'suppliers')->first();
            $role_s_freelactose->attachPermission($freelactose_pro);
        }
        if ($request->underexpire_s_pro == 1) {
            $role_s_underexpire = Role::where('name', 'suppliers')->first();
            $role_s_underexpire->attachPermission($underexpire_pro);
        }
        if ($request->attribute_category_s_pro == 1) {
            $role_s_attributecat = Role::where('name', 'suppliers')->first();
            $role_s_attributecat->attachPermission($attribute_category_pro);
        }


        if ($request->name_e_pro == 1) {
            $role_e_name = Role::where('name', 'employee')->first();
            $role_e_name->attachPermission($name_pro);
        }
        if ($request->supplier_e_pro == 1) {
            $role_e_supplier = Role::where('name', 'employee')->first();
            $role_e_supplier->attachPermission($supplier_pro);
        }
        if ($request->attachents_e_pro == 1) {
            $role_e_attach = Role::where('name', 'employee')->first();
            $role_e_attach->attachPermission($attach_pro);
        }
        if ($request->category_e_pro == 1) {
            $role_e_cat = Role::where('name', 'employee')->first();
            $role_e_cat->attachPermission($cat_pro);
        }
        if ($request->subphotos_e_pro == 1) {
            $role_e_subphotos = Role::where('name', 'employee')->first();
            $role_e_subphotos->attachPermission($subphotos_pro);
        }
        if ($request->mainphoto_e_pro == 1) {
            $role_e_mainphoto = Role::where('name', 'employee')->first();
            $role_e_mainphoto->attachPermission($mainphoto_pro);
        }
        if ($request->descr_e_pro == 1) {
            $role_e_descr = Role::where('name', 'employee')->first();
            $role_e_descr->attachPermission($descr_pro);
        }
        if ($request->sorting_e_pro == 1) {
            $role_e_sort = Role::where('name', 'employee')->first();
            $role_e_sort->attachPermission($sort_pro);
        }
        if ($request->weight_e_pro == 1) {
            $role_e_weight = Role::where('name', 'employee')->first();
            $role_e_weight->attachPermission($weight_pro);
        }
        if ($request->fill_e_pro == 1) {
            $role_e_fill = Role::where('name', 'employee')->first();
            $role_e_fill->attachPermission($fill_pro);
        }
        if ($request->color_e_pro == 1) {
            $role_e_color = Role::where('name', 'employee')->first();
            $role_e_color->attachPermission($color_pro);
        }
        if ($request->organic_e_pro == 1) {
            $role_e_organic = Role::where('name', 'employee')->first();
            $role_e_organic->attachPermission($organic_pro);
        }
        if ($request->freesugar_e_pro == 1) {
            $role_e_freesugar = Role::where('name', 'employee')->first();
            $role_e_freesugar->attachPermission($freesugar);
        }
        if ($request->freelactose_e_pro == 1) {
            $role_e_freelactose = Role::where('name', 'employee')->first();
            $role_e_freelactose->attachPermission($freelactose_pro);
        }
        if ($request->underexpire_e_pro == 1) {
            $role_e_underexpire = Role::where('name', 'employee')->first();
            $role_e_underexpire->attachPermission($underexpire_pro);
        }
        if ($request->attribute_category_e_pro == 1) {
            $role_e_attributecat = Role::where('name', 'employee')->first();
            $role_e_attributecat->attachPermission($attribute_category_pro);
        }


        return redirect('/products')
            ->with('success', 'تم انشاء المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $product = Products::where('name', $name)->first();
        $suppliers = Suppliers::with('getUser')->get();
        $categories = Category::where('parent_id', null)->get();
        $subcategories = Category::where('parent_id', $product->category_id)->get();

        $name_prod = Permission::where('name', 'pro_name_' . $product->id)->first();
        $supplier_prod = Permission::where('name', 'supplier_pro_' . $product->id)->first();
        $attach_prod = Permission::where('name', 'attach_pro_' . $product->id)->first();
        $cat_prod = Permission::where('name', 'cat_pro_' . $product->id)->first();
        $subphotos_prod = Permission::where('name', 'subphotos_pro_' . $product->id)->first();
        $mainphoto_prod = Permission::where('name', 'mainphoto_pro_' . $product->id)->first();
        $descr_prod = Permission::where('name', 'descr_pro_' . $product->id)->first();
        $sort_prod = Permission::where('name', 'sort_pro_' . $product->id)->first();
        $weight_prod = Permission::where('name', 'weight_pro_' . $product->id)->first();
        $fill_prod = Permission::where('name', 'fill_pro_' . $product->id)->first();
        $color_prod = Permission::where('name', 'color_pro_' . $product->id)->first();
        $organic_prod = Permission::where('name', 'organic_pro_' . $product->id)->first();
        $freesugar_prod = Permission::where('name', 'freesugar_' . $product->id)->first();
        $freelactose_prod = Permission::where('name', 'freelactose_pro_' . $product->id)->first();
        $underexpire_prod = Permission::where('name', 'underexpire_pro_' . $product->id)->first();
        $attributecat_prod = Permission::where('name', 'attribute_category_pro_' . $product->id)->first();


        $product_role_v = Role::where('name', 'visitor')->first();
        $product_role_c = Role::where('name', 'customer')->first();
        $product_role_s = Role::where('name', 'suppliers')->first();
        $product_role_e = Role::where('name', 'employee')->first();

        $role_per_name = Permission_role::where('permission_id', $name_prod->id)->first();
        $role_per_v_supplier = Permission_role::where('permission_id', $supplier_prod->id)->first();
        $role_attach = Permission_role::where('permission_id', $attach_prod->id)->first();
        $role_per_cat = Permission_role::where('permission_id', $cat_prod->id)->first();
        $role_subphotos = Permission_role::where('permission_id', $subphotos_prod->id)->first();
        $role_mainphoto = Permission_role::where('permission_id', '=', $mainphoto_prod->id)->first();
        $role_per_v_descr = Permission_role::where('permission_id', $descr_prod->id)->first();
        $role_sort = Permission_role::where('permission_id', $sort_prod->id)->first();
        $role_weight = Permission_role::where('permission_id', $weight_prod->id)->first();
        $role_fill = Permission_role::where('permission_id', $fill_prod->id)->first();
        $role_color = Permission_role::where('permission_id', $color_prod->id)->first();
        $role_organic = Permission_role::where('permission_id', $organic_prod->id)->first();
        $role_freesugar = Permission_role::where('permission_id', $freesugar_prod->id)->first();
        $role_freelactose = Permission_role::where('permission_id', $freelactose_prod->id)->first();
        $role_underexpire = Permission_role::where('permission_id', $underexpire_prod->id)->first();
        $role_attributecat = Permission_role::where('permission_id', $attributecat_prod->id)->first();

        $attributes = Attribute::where('category_id', $product->category_id)->get();
        foreach ($attributes as $attribute) {
            $product_attributes = Product_attribute::where('product_id', $product->id)->with(['attribute' => function ($q) use ($attribute) {
                $q->where('id', $attribute->id);
                $q->where('group_id', 'null');
            }, 'attribute'])->get();
        }

        $images_product = Images::where('product_id', $product->id)->get();

        $publications_product = Products_publication::where('product_id', $product->id)->get();

        return view('admin.products.product', compact('product', 'suppliers', 'categories',
            'role_per_v_supplier', 'role_per_cat', 'role_weight', 'role_organic', 'role_freesugar', 'role_freelactose', 'role_underexpire',
            'role_attributecat', 'role_subphotos', 'role_attach', 'publications_product', 'role_color', 'role_mainphoto', 'images_product', 'role_fill', 'role_per_v_descr', 'role_sort', 'product_attributes', 'product_role_s', 'subcategories', 'product_role_c', 'product_role_e', 'role_per_name', 'product_role_v'));
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


        $product = Products::find($id);
        $product->name = $request->name;
        $product->en_name = $request->en_name;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->descr = $request->descr;
        $product->descr_en = $request->descr_en;
        $product->sorting = $request->sorting;
        $product->weight_product = $request->weight_product;
        $product->fill_product = $request->fill_product;
        $product->fill_product_en = $request->fill_product_en;
        $product->color_product = $request->color_product;
        $product->color_product_en = $request->color_product_en;
        $product->organic = $request->organic;
        $product->free_sugar = $request->free_sugar;
        $product->free_lactose = $request->free_lactose;
        $product->under_expire = $request->under_expire;
        $file = $request->file('main_image');
        if ($request->hasFile('main_image')) {
            $old_file = 'uploads/' . $product->image;
            if (is_file($old_file)) unlink($old_file);
            $fileName = 'main_pro-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('main_image')->move($destinationPath, $fileName);
            $product->image = $fileName;
        }
        $product->save();

        $attributesIDs = $request->IDs;

        $attributesValues = $request->values;
        $attributesValues_en = $request->values_en;
        if (isset($attributesIDs) && isset($attributesValues) && isset($attributesValues_en)) {
            $updatedData = [];
            $result = array_filter($attributesIDs, function ($v) {
                return trim($v);
            });
            for ($i = 1; $i <= count($result) + 2; $i += 2) {
                $updatedData[$result[$i]] = ['attribute_value' => $attributesValues[0], 'attribute_value_en' => $attributesValues_en[1]];

            }


            $product->attributes()->sync($updatedData);
        }
        if ($request->hasFile('productImages')) {
            $images = Images::where('product_id', $id)->get();
            foreach ($images as $img) {
                $old_file = 'uploads/' . $img->image;
                if (is_file($old_file)) unlink($old_file);
                $img->delete();
            }


            $imageNames = $request->file('productImages');

            foreach ($imageNames as $name) {
                $img = "";
                $img = str_random(4) . $name->getClientOriginalName();

                $fileName = 'main_pro-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = 'uploads';
                $name->move($destinationPath, $img);
                $image = new Images();
                $image->image = $img;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        if ($request->hasFile('attachment')) {
            $attachments_file = Products_publication::where('product_id', $id)->get();
            foreach ($attachments_file as $attachment_file) {
                $old_file = 'uploads/' . $attachment_file->image;
                if (is_file($old_file)) unlink($old_file);
                $attachment_file->delete();
            }

            $attachs_file = $request->file('attachment');
            foreach ($attachs_file as $attach_file) {

                $attachment = "";
                $attachment = str_random(4) . $attach_file->getClientOriginalName();

                $destinationPath = 'uploads';
                $attach_file->move($destinationPath, $attachment);
                $attach = new Products_publication();
                $attach->attachment = $attachment;
                $attach->product_id = $product->id;
                $attach->save();
            }
        }


        $name_product = Permission::where('name', 'pro_name_' . $product->id)->first();
        $supplier_product = Permission::where('name', 'supplier_pro_' . $product->id)->first();
        $attach_product = Permission::where('name', 'attach_pro_' . $product->id)->first();
        $cat_product = Permission::where('name', 'cat_pro_' . $product->id)->first();
        $subphotos_product = Permission::where('name', 'subphotos_pro_' . $product->id)->first();
        $mainphoto_product = Permission::where('name', 'mainphoto_pro_' . $product->id)->first();
        $descr_product = Permission::where('name', 'descr_pro_' . $product->id)->first();
        $sort_product = Permission::where('name', 'sort_pro_' . $product->id)->first();
        $weight_product = Permission::where('name', 'weight_pro_' . $product->id)->first();
        $fill_product = Permission::where('name', 'fill_pro_' . $product->id)->first();
        $color_product = Permission::where('name', 'color_pro_' . $product->id)->first();
        $organic_product = Permission::where('name', 'organic_pro_' . $product->id)->first();
        $freesugar_product = Permission::where('name', 'freesugar_' . $product->id)->first();
        $freelactose_product = Permission::where('name', 'freelactose_pro_' . $product->id)->first();
        $underexpire_product = Permission::where('name', 'underexpire_pro_' . $product->id)->first();
        $attributecat_product = Permission::where('name', 'attribute_category_pro_' . $product->id)->first();

//        $role_per_name=Permission_role::where('permission_id',$name_product->id)->first();
//        $role_per_v_supplier=Permission_role::where('permission_id',$supplier_product->id)->first();
//        $role_attach=Permission_role::where('permission_id',$attach_product->id)->first();
//        $role_per_cat=Permission_role::where('permission_id',$cat_product->id)->first();
//        $role_subphotos=Permission_role::where('permission_id',$subphotos_product->id)->first();
//        $role_mainphoto=Permission_role::where('permission_id','=',$mainphoto_product->id)->first();
//        $role_per_v_descr=Permission_role::where('permission_id',$descr_product->id)->first();
//        $role_sort=Permission_role::where('permission_id',$sort_product->id)->first();
//        $role_weight=Permission_role::where('permission_id',$weight_product->id)->first();
//        $role_fill=Permission_role::where('permission_id',$fill_product->id)->first();
//        $role_color=Permission_role::where('permission_id',$color_product->id)->first();
//        $role_organic=Permission_role::where('permission_id',$organic_product->id)->first();
//        $role_freesugar=Permission_role::where('permission_id',$freesugar_product->id)->first();
//        $role_freelactose=Permission_role::where('permission_id',$freelactose_product->id)->first();
//        $role_underexpire=Permission_role::where('permission_id',$underexpire_product->id)->first();
//        $role_attributecat=Permission_role::where('permission_id',$attributecat_product->id)->first();

        if ($request->name_v_pro == 1) {
            $role_v_n = Role::where('name', 'visitor')->first();
//            if ($role_per_name->role_id==$role_v_n->id){
            $role_v_n->perms()->detach($name_product);
//            }
            $role_v_n->attachPermission($name_product);

        }
        if ($request->supplier_v_pro == 1) {
            $role_v_s = Role::where('name', 'visitor')->first();
//            if ($role_per_v_supplier->role_id==$role_v_s->id){
            $role_v_s->perms()->detach($supplier_product);
//            }
            $role_v_s->attachPermission($supplier_product);
        }

        if ($request->attachents_v_pro == 1) {
            $role_v_attach = Role::where('name', 'visitor')->first();
//            if ($role_attach->role_id==$role_v_attach->id){
            $role_v_attach->perms()->detach($supplier_product);
//            }
            $role_v_attach->attachPermission($attach_product);

        }
        if ($request->category_v_pro == 1) {
            $role_v_cat = Role::where('name', 'visitor')->first();
//            if ($role_per_cat->role_id==$role_v_cat->id){
            $role_v_cat->perms()->detach($cat_product);
//            }
            $role_v_cat->attachPermission($cat_product);
        }
        if ($request->subphotos_v_pro == 1) {
            $role_v_subphoto = Role::where('name', 'visitor')->first();
//            if ($role_subphotos->role_id==$role_v_subphoto->id){
            $role_v_subphoto->perms()->detach($subphotos_product);
//            }
            $role_v_subphoto->attachPermission($subphotos_product);

        }
        if ($request->mainphoto_v_pro == 1) {
            $role_v_mainphoto = Role::where('name', 'visitor')->first();
//            if ($role_mainphoto->role_id==$role_v_mainphoto->id){
            $role_v_mainphoto->perms()->detach($mainphoto_product);
//            }
            $role_v_mainphoto->attachPermission($mainphoto_product);

        }
        if ($request->descr_v_pro == 1) {
            $role_v_descr = Role::where('name', 'visitor')->first();
//            if ($role_per_v_descr->role_id==$role_v_descr->id){
            $role_v_descr->perms()->detach($descr_product);
//            }
            $role_v_descr->attachPermission($descr_product);

        }
        if ($request->sorting_v_pro == 1) {

            $role_v_sort = Role::where('name', 'visitor')->first();
//            if ($role_sort->role_id==$role_v_sort->id){
            $role_v_sort->perms()->detach($sort_product);
//            }
            $role_v_sort->attachPermission($sort_product);

        }
        if ($request->weight_v_pro == 1) {
            $role_v_weight = Role::where('name', 'visitor')->first();
//            if ($role_weight->role_id==$role_v_weight->id){
            $role_v_weight->perms()->detach($weight_product);
//            }
            $role_v_weight->attachPermission($weight_product);

        }
        if ($request->fill_v_pro == 1) {
            $role_v_fill = Role::where('name', 'visitor')->first();
//            if ($role_fill->role_id==$role_v_fill->id){
            $role_v_fill->perms()->detach($fill_product);
//            }
            $role_v_fill->attachPermission($fill_product);

        }
        if ($request->color_v_pro == 1) {
            $role_v_color = Role::where('name', 'visitor')->first();
//            if ($role_color->role_id==$role_v_color->id){
            $role_v_color->perms()->detach($color_product);
//            }
            $role_v_color->attachPermission($color_product);
        }
        if ($request->organic_v_pro == 1) {
            $role_v_organic = Role::where('name', 'visitor')->first();
//            if ($role_organic->role_id==$role_v_organic->id){
            $role_v_organic->perms()->detach($organic_product);
//            }
            $role_v_organic->attachPermission($organic_product);
        }
        if ($request->freesugar_v_pro == 1) {
            $role_v_freesugar = Role::where('name', 'visitor')->first();
//            if ($role_freesugar->role_id==$role_v_freesugar->id){
            $role_v_freesugar->perms()->detach($freesugar_product);
//            }
            $role_v_freesugar->attachPermission($freesugar_product);
        }
        if ($request->freelactose_v_pro == 1) {
            $role_v_freelactose = Role::where('name', 'visitor')->first();
//            if ($role_freelactose->role_id==$role_v_freelactose->id){
            $role_v_freelactose->perms()->detach($freelactose_product);
//            }
            $role_v_freelactose->attachPermission($freelactose_product);
        }
        if ($request->underexpire_v_pro == 1) {
            $role_v_underexpire = Role::where('name', 'visitor')->first();
//            if ($role_underexpire->role_id==$role_v_underexpire->id){
            $role_v_underexpire->perms()->detach($underexpire_product);
//            }
            $role_v_underexpire->attachPermission($underexpire_product);
        }
        if ($request->attribute_category_v_pro == 1) {
            $role_v_attributecat = Role::where('name', 'visitor')->first();
//            if ($role_attributecat->role_id==$role_v_attributecat->id){
            $role_v_attributecat->perms()->detach($attributecat_product);
//            }
            $role_v_attributecat->attachPermission($attributecat_product);
        }


        if ($request->name_c_pro == 1) {
            $role_c_name = Role::where('name', 'customer')->first();
//            if ($role_per_name->role_id==$role_c_name->id){
            $role_c_name->perms()->detach($name_product);
//            }
            $role_c_name->attachPermission($name_product);
        }
        if ($request->supplier_c_pro == 1) {
            $role_c_supplier = Role::where('name', 'customer')->first();
//            if ($role_per_v_supplier->role_id==$role_c_supplier->id){
            $role_c_supplier->perms()->detach($supplier_product);
//            }
            $role_c_supplier->attachPermission($supplier_product);
        }

        if ($request->attachents_c_pro == 1) {
            $role_c_attach = Role::where('name', 'customer')->first();
//            if ($role_attach->role_id==$role_c_attach->id){
            $role_c_attach->perms()->detach($attach_product);
//            }
            $role_c_attach->attachPermission($attach_product);
        }

        if ($request->category_c_pro == 1) {
            $role_c_cat = Role::where('name', 'customer')->first();
//            if ($role_per_cat->role_id==$role_c_cat->id){
            $role_c_cat->perms()->detach($cat_product);
//            }
            $role_c_cat->attachPermission($cat_product);
        }
        if ($request->subphotos_c_pro == 1) {
            $role_c_subphotos = Role::where('name', 'customer')->first();
//            if ($role_subphotos->role_id==$role_c_subphotos->id){
            $role_c_subphotos->perms()->detach($subphotos_product);
//            }
            $role_c_subphotos->attachPermission($subphotos_product);
        }
        if ($request->mainphoto_c_pro == 1) {
            $role_c_mainphoto = Role::where('name', 'customer')->first();
//            if ($role_mainphoto->role_id==$role_c_mainphoto->id){
            $role_c_mainphoto->perms()->detach($mainphoto_product);
//            }
            $role_c_mainphoto->attachPermission($mainphoto_product);
        }
        if ($request->descr_c_pro == 1) {
            $role_c_descr = Role::where('name', 'customer')->first();
//            if ($role_per_v_descr->role_id==$role_c_descr->id){
            $role_c_descr->perms()->detach($descr_product);
//            }
            $role_c_descr->attachPermission($descr_product);
        }
        if ($request->sorting_c_pro == 1) {
            $role_c_sort = Role::where('name', 'customer')->first();
//            if ($role_sort->role_id==$role_c_sort->id){
            $role_c_sort->perms()->detach($sort_product);
//            }
            $role_c_sort->attachPermission($sort_product);
        }
        if ($request->weight_c_pro == 1) {
            $role_c_weight = Role::where('name', 'customer')->first();
//            if ($role_weight->role_id==$role_c_weight->id){
            $role_c_weight->perms()->detach($weight_product);
//            }
            $role_c_weight->attachPermission($weight_product);
        }
        if ($request->fill_c_pro == 1) {
            $role_c_fill = Role::where('name', 'customer')->first();
//            if ($role_fill->role_id==$role_c_fill->id){
            $role_c_fill->perms()->detach($fill_product);
//            }
            $role_c_fill->attachPermission($fill_product);
        }
        if ($request->color_c_pro == 1) {
            $role_c_color = Role::where('name', 'customer')->first();
//            if ($role_color->role_id==$role_c_color->id){
            $role_c_color->perms()->detach($color_product);
//            }
            $role_c_color->attachPermission($color_product);
        }
        if ($request->organic_c_pro == 1) {
            $role_c_organic = Role::where('name', 'customer')->first();
//            if ($role_organic->role_id==$role_c_organic->id){
            $role_c_organic->perms()->detach($organic_product);
//            }
            $role_c_organic->attachPermission($organic_product);
        }
        if ($request->freesugar_c_pro == 1) {
            $role_c_freesugar = Role::where('name', 'customer')->first();
//            if ($role_freesugar->role_id==$role_c_freesugar->id){
            $role_c_freesugar->perms()->detach($freesugar_product);
//            }
            $role_c_freesugar->attachPermission($freesugar_product);
        }
        if ($request->freelactose_c_pro == 1) {
            $role_c_freelactose = Role::where('name', 'customer')->first();
//            if ($role_freelactose->role_id==$role_c_freelactose->id){
            $role_c_freelactose->perms()->detach($freelactose_product);
//            }
            $role_c_freelactose->attachPermission($freelactose_product);
        }
        if ($request->underexpire_c_pro == 1) {
            $role_c_underexpire = Role::where('name', 'customer')->first();
//            if ($role_underexpire->role_id==$role_c_underexpire->id){
            $role_c_underexpire->perms()->detach($underexpire_product);
//            }
            $role_c_underexpire->attachPermission($underexpire_product);
        }
        if ($request->attribute_category_c_pro == 1) {
            $role_c_attributecat = Role::where('name', 'customer')->first();
//            if ($role_attributecat->role_id==$role_c_attributecat->id){
            $role_c_attributecat->perms()->detach($attributecat_product);
//            }
            $role_c_attributecat->attachPermission($attributecat_product);
        }


        if ($request->name_s_pro == 1) {
            $role_s_name = Role::where('name', 'suppliers')->first();
//            if ($role_per_name->role_id==$role_s_name->id){
            $role_s_name->perms()->detach($name_product);
//            }
            $role_s_name->attachPermission($name_product);
        }
        if ($request->supplier_s_pro == 1) {
            $role_s_supplier = Role::where('name', 'suppliers')->first();
//            if ($role_per_v_supplier->role_id==$role_s_supplier->id){
            $role_s_supplier->perms()->detach($supplier_product);
//            }
            $role_s_supplier->attachPermission($supplier_product);
        }
        if ($request->attachents_s_pro == 1) {
            $role_s_attach = Role::where('name', 'suppliers')->first();
//            if ($role_attach->role_id==$role_s_attach->id){
            $role_s_attach->perms()->detach($attach_product);
//            }
            $role_s_attach->attachPermission($attach_product);
        }
        if ($request->category_s_pro == 1) {
            $role_s_category = Role::where('name', 'suppliers')->first();
//            if ($role_per_cat->role_id==$role_s_category->id){
            $role_s_category->perms()->detach($cat_product);
//            }
            $role_s_category->attachPermission($cat_product);
        }
        if ($request->subphotos_s_pro == 1) {
            $role_s_subphotos = Role::where('name', 'suppliers')->first();
//            if ($role_subphotos->role_id==$role_s_subphotos->id){
            $role_s_subphotos->perms()->detach($subphotos_product);
//            }
            $role_s_subphotos->attachPermission($subphotos_product);
        }
        if ($request->mainphoto_s_pro == 1) {
            $role_s_mainphoto = Role::where('name', 'suppliers')->first();
//            if ($role_mainphoto->role_id==$role_s_mainphoto->id){
            $role_s_mainphoto->perms()->detach($mainphoto_product);
//            }
            $role_s_mainphoto->attachPermission($mainphoto_product);
        }
        if ($request->descr_s_pro == 1) {
            $role_s_descr = Role::where('name', 'suppliers')->first();
//            if ($role_per_v_descr->role_id==$role_s_descr->id){
            $role_s_descr->perms()->detach($descr_product);
//            }
            $role_s_descr->attachPermission($descr_product);
        }
        if ($request->sorting_s_pro == 1) {
            $role_s_sort = Role::where('name', 'suppliers')->first();
//            if ($role_sort->role_id==$role_s_sort->id){
            $role_s_sort->perms()->detach($sort_product);
//            }
            $role_s_sort->attachPermission($sort_product);
        }
        if ($request->weight_s_pro == 1) {
            $role_s_weight = Role::where('name', 'suppliers')->first();
//            if ($role_weight->role_id==$role_s_weight->id){
            $role_s_weight->perms()->detach($weight_product);
//            }
            $role_s_weight->attachPermission($weight_product);
        }
        if ($request->fill_s_pro == 1) {
            $role_s_fill = Role::where('name', 'suppliers')->first();
//            if ($role_fill->role_id==$role_s_fill->id){
            $role_s_fill->perms()->detach($fill_product);
//            }
            $role_s_fill->attachPermission($fill_product);
        }
        if ($request->color_s_pro == 1) {
            $role_s_color = Role::where('name', 'suppliers')->first();
//            if ($role_color->role_id==$role_s_color->id){
            $role_s_color->perms()->detach($color_product);
//            }
            $role_s_color->attachPermission($color_product);
        }
        if ($request->organic_s_pro == 1) {
            $role_s_organic = Role::where('name', 'suppliers')->first();
//            if ($role_organic->role_id==$role_s_organic->id){
            $role_s_organic->perms()->detach($organic_product);
//            }
            $role_s_organic->attachPermission($organic_product);
        }
        if ($request->freesugar_s_pro == 1) {
            $role_s_freesugar = Role::where('name', 'suppliers')->first();
//            if ($role_freesugar->role_id==$role_s_freesugar->id){
            $role_s_freesugar->perms()->detach($freesugar_product);
//            }
            $role_s_freesugar->attachPermission($freesugar_product);
        }
        if ($request->freelactose_s_pro == 1) {
            $role_s_freelactose = Role::where('name', 'suppliers')->first();
//            if ($role_freelactose->role_id==$role_s_freelactose->id){
            $role_s_freelactose->perms()->detach($freelactose_product);
//            }
            $role_s_freelactose->attachPermission($freelactose_product);
        }
        if ($request->underexpire_s_pro == 1) {
            $role_s_underexpire = Role::where('name', 'suppliers')->first();
//            if ($role_underexpire->role_id==$role_s_underexpire->id){
            $role_s_underexpire->perms()->detach($underexpire_product);
//            }
            $role_s_underexpire->attachPermission($underexpire_product);
        }
        if ($request->attribute_category_s_pro == 1) {
            $role_s_attributecat = Role::where('name', 'suppliers')->first();
//            if ($role_attributecat->role_id==$role_s_attributecat->id){
            $role_s_attributecat->perms()->detach($attributecat_product);
//            }
            $role_s_attributecat->attachPermission($attributecat_product);
        }


        if ($request->name_e_pro == 1) {
            $role_e_name = Role::where('name', 'employee')->first();
//            if ($role_per_name->role_id==$role_e_name->id){
            $role_e_name->perms()->detach($name_product);
//            }
            $role_e_name->attachPermission($name_product);
        }
        if ($request->supplier_e_pro == 1) {
            $role_e_supplier = Role::where('name', 'employee')->first();
//            if ($role_per_v_supplier->role_id==$role_e_supplier->id){
            $role_e_supplier->perms()->detach($supplier_product);
//            }
            $role_e_supplier->attachPermission($supplier_product);
        }
        if ($request->attachents_e_pro == 1) {
            $role_e_attach = Role::where('name', 'employee')->first();
//            if ($role_attach->role_id==$role_e_attach->id){
            $role_e_attach->perms()->detach($attach_product);
//            }
            $role_e_attach->attachPermission($attach_product);
        }
        if ($request->category_e_pro == 1) {
            $role_e_cat = Role::where('name', 'employee')->first();
//            if ($role_per_cat->role_id==$role_e_cat->id){
            $role_e_cat->perms()->detach($cat_product);
//            }
            $role_e_cat->attachPermission($cat_product);
        }
        if ($request->subphotos_e_pro == 1) {
            $role_e_subphotos = Role::where('name', 'employee')->first();
//            if ($role_subphotos->role_id==$role_e_subphotos->id){
            $role_e_subphotos->perms()->detach($subphotos_product);
//            }
            $role_e_subphotos->attachPermission($subphotos_product);
        }
        if ($request->mainphoto_e_pro == 1) {
            $role_e_mainphoto = Role::where('name', 'employee')->first();
//            if ($role_mainphoto->role_id==$role_e_mainphoto->id){
            $role_e_mainphoto->perms()->detach($mainphoto_product);
//            }
            $role_e_mainphoto->attachPermission($mainphoto_product);
        }
        if ($request->descr_e_pro == 1) {
            $role_e_descr = Role::where('name', 'employee')->first();
//            if ($role_per_v_descr->role_id==$role_e_descr->id){
            $role_e_descr->perms()->detach($descr_product);
//            }
            $role_e_descr->attachPermission($descr_product);
        }
        if ($request->sorting_e_pro == 1) {
            $role_e_sort = Role::where('name', 'employee')->first();
//            if ($role_sort->role_id==$role_e_sort->id){
            $role_e_sort->perms()->detach($sort_product);
//            }
            $role_e_sort->attachPermission($sort_product);
        }
        if ($request->weight_e_pro == 1) {
            $role_e_weight = Role::where('name', 'employee')->first();
//            if ($role_weight->role_id==$role_e_weight->id){
            $role_e_weight->perms()->detach($weight_product);
//            }
            $role_e_weight->attachPermission($weight_product);
        }
        if ($request->fill_e_pro == 1) {
            $role_e_fill = Role::where('name', 'employee')->first();
//            if ($role_fill->role_id==$role_e_fill->id){
            $role_e_fill->perms()->detach($fill_product);
//            }
            $role_e_fill->attachPermission($fill_product);
        }
        if ($request->color_e_pro == 1) {
            $role_e_color = Role::where('name', 'employee')->first();
//            if ($role_color->role_id==$role_e_color->id){
            $role_e_color->perms()->detach($color_product);
//            }
            $role_e_color->attachPermission($color_product);
        }
        if ($request->organic_e_pro == 1) {
            $role_e_organic = Role::where('name', 'employee')->first();
//            if ($role_organic->role_id==$role_e_organic->id){
            $role_e_organic->perms()->detach($organic_product);
//            }
            $role_e_organic->attachPermission($organic_product);
        }
        if ($request->freesugar_e_pro == 1) {
            $role_e_freesugar = Role::where('name', 'employee')->first();
//            if ($role_freesugar->role_id==$role_e_freesugar->id){
            $role_e_freesugar->perms()->detach($freesugar_product);
//            }
            $role_e_freesugar->attachPermission($freesugar_product);
        }
        if ($request->freelactose_e_pro == 1) {
            $role_e_freelactose = Role::where('name', 'employee')->first();
//            if ($role_freelactose->role_id==$role_e_freelactose->id){
            $role_e_freelactose->perms()->detach($freelactose_product);
//            }
            $role_e_freelactose->attachPermission($freelactose_product);
        }
        if ($request->underexpire_e_pro == 1) {
            $role_e_underexpire = Role::where('name', 'employee')->first();
//            if ($role_underexpire->role_id==$role_e_underexpire->id){
            $role_e_underexpire->perms()->detach($underexpire_product);
//            }
            $role_e_underexpire->attachPermission($underexpire_product);
        }
        if ($request->attribute_category_e_pro == 1) {
            $role_e_attributecat = Role::where('name', 'employee')->first();
//            if ($role_attributecat->role_id==$role_e_attributecat->id){
            $role_e_attributecat->perms()->detach($attributecat_product);
//            }
            $role_e_attributecat->attachPermission($attributecat_product);
        }

        return redirect('/products')
            ->with('success', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_d = Products::find($id);
        $image_path = "/uploads/" . $product_d->image;  // Value is not URL but directory file path
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product_d->delete();

        $images_pro = Images::where('product_id', $id)->get();
        foreach ($images_pro as $image_pro) {
            $image_path = "/uploads/" . $image_pro->image;  // Value is not URL but directory file path
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image_pro->delete();

        }

        $attributes_pro = Product_attribute::where('product_id', $id)->get();
        foreach ($attributes_pro as $attribute_pro) {
            $attribute_pro->delete();
        }

        $product_role_v = Role::where('name', 'visitor')->first();
        $product_role_c = Role::where('name', 'customer')->first();
        $product_role_s = Role::where('name', 'suppliers')->first();
        $product_role_e = Role::where('name', 'employee')->first();

        $name_pro_d = Permission::where('name', 'pro_name_' . $id)->first();
        $role_pro_name = Permission_role::where('permission_id', $name_pro_d->id)->first();
        if ($role_pro_name->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($name_pro_d);
        }
        if ($role_pro_name->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($name_pro_d);
        }
        if ($role_pro_name->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($name_pro_d);
        }
        if ($role_pro_name->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($name_pro_d);
        }
        $name_pro_d->delete();

        $supplier_pro_d = Permission::where('name', 'supplier_pro_' . $id)->first();
        $role_pro_supplier = Permission_role::where('permission_id', $supplier_pro_d->id)->first();
        if ($role_pro_supplier->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($supplier_pro_d);
        }
        if ($role_pro_supplier->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($supplier_pro_d);
        }
        if ($role_pro_supplier->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($supplier_pro_d);
        }
        if ($role_pro_supplier->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($supplier_pro_d);
        }
        $supplier_pro_d->delete();

        $attach_pro_d = Permission::where('name', 'attach_pro_' . $id)->first();
        $role_attach = Permission_role::where('permission_id', $attach_pro_d->id)->first();
        if ($role_attach->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($attach_pro_d);
        }
        if ($role_attach->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($attach_pro_d);
        }
        if ($role_attach->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($attach_pro_d);
        }
        if ($role_attach->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($attach_pro_d);
        }
        $attach_pro_d->delete();

        $cat_pro_d = Permission::where('name', 'cat_pro_' . $id)->first();
        $role_pro_cat = Permission_role::where('permission_id', $cat_pro_d->id)->first();
        if ($role_pro_cat->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($cat_pro_d);
        }
        if ($role_pro_cat->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($cat_pro_d);
        }
        if ($role_pro_cat->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($cat_pro_d);
        }
        if ($role_pro_cat->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($cat_pro_d);
        }
        $cat_pro_d->delete();

        $subphotos_pro_d = Permission::where('name', 'subphotos_pro_' . $id)->first();
        $role_subphotos = Permission_role::where('permission_id', $subphotos_pro_d->id)->first();
        if ($role_subphotos->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($subphotos_pro_d);
        }
        if ($role_subphotos->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($subphotos_pro_d);
        }
        if ($role_subphotos->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($subphotos_pro_d);
        }
        if ($role_subphotos->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($subphotos_pro_d);
        }
        $subphotos_pro_d->delete();

        $mainphoto_pro_d = Permission::where('name', 'mainphoto_pro_' . $id)->first();
        $role_mainphoto = Permission_role::where('permission_id', '=', $mainphoto_pro_d->id)->first();
        if ($role_mainphoto->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($mainphoto_pro_d);
        }
        if ($role_mainphoto->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($mainphoto_pro_d);
        }
        if ($role_mainphoto->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($mainphoto_pro_d);
        }
        if ($role_mainphoto->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($mainphoto_pro_d);
        }
        $mainphoto_pro_d->delete();

        $descr_pro_d = Permission::where('name', 'descr_pro_' . $id)->first();
        $role_pro_descr = Permission_role::where('permission_id', $descr_pro_d->id)->first();
        if ($role_pro_descr->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($descr_pro_d);
        }
        if ($role_pro_descr->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($descr_pro_d);
        }
        if ($role_pro_descr->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($descr_pro_d);
        }
        if ($role_pro_descr->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($descr_pro_d);
        }
        $descr_pro_d->delete();

        $sort_pro_d = Permission::where('name', 'sort_pro_' . $id)->first();
        $role_sort = Permission_role::where('permission_id', $sort_pro_d->id)->first();
        if ($role_sort->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($sort_pro_d);
        }
        if ($role_sort->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($sort_pro_d);
        }
        if ($role_sort->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($sort_pro_d);
        }
        if ($role_sort->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($sort_pro_d);
        }
        $sort_pro_d->delete();

        $weight_pro_d = Permission::where('name', 'weight_pro_' . $id)->first();
        $role_weight = Permission_role::where('permission_id', $weight_pro_d->id)->first();
        if ($role_weight->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($weight_pro_d);
        }
        if ($role_weight->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($weight_pro_d);
        }
        if ($role_weight->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($weight_pro_d);
        }
        if ($role_weight->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($weight_pro_d);
        }
        $weight_pro_d->delete();

        $fill_pro_d = Permission::where('name', 'fill_pro_' . $id)->first();
        $role_fill = Permission_role::where('permission_id', $fill_pro_d->id)->first();
        if ($role_fill->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($fill_pro_d);
        }
        if ($role_fill->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($fill_pro_d);
        }
        if ($role_fill->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($fill_pro_d);
        }
        if ($role_fill->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($fill_pro_d);
        }
        $fill_pro_d->delete();

        $color_pro_d = Permission::where('name', 'color_pro_' . $id)->first();
        $role_color = Permission_role::where('permission_id', $color_pro_d->id)->first();
        if ($role_color->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($color_pro_d);
        }
        if ($role_color->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($color_pro_d);
        }
        if ($role_color->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($color_pro_d);
        }
        if ($role_color->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($color_pro_d);
        }
        $color_pro_d->delete();

        $organic_pro_d = Permission::where('name', 'organic_pro_' . $id)->first();
        $role_organic = Permission_role::where('permission_id', $organic_pro_d->id)->first();
        if ($role_organic->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($organic_pro_d);
        }
        if ($role_organic->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($organic_pro_d);
        }
        if ($role_organic->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($organic_pro_d);
        }
        if ($role_organic->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($organic_pro_d);
        }
        $organic_pro_d->delete();

        $freesugar_pro_d = Permission::where('name', 'freesugar_' . $id)->first();
        $role_freesugar = Permission_role::where('permission_id', $freesugar_pro_d->id)->first();
        if ($role_freesugar->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($freesugar_pro_d);
        }
        if ($role_freesugar->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($freesugar_pro_d);
        }
        if ($role_freesugar->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($freesugar_pro_d);
        }
        if ($role_freesugar->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($freesugar_pro_d);
        }
        $freesugar_pro_d->delete();

        $freelactose_pro_d = Permission::where('name', 'freelactose_pro_' . $id)->first();
        $role_freelactose = Permission_role::where('permission_id', $freelactose_pro_d->id)->first();
        if ($role_freelactose->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($freelactose_pro_d);
        }
        if ($role_freelactose->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($freelactose_pro_d);
        }
        if ($role_freelactose->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($freelactose_pro_d);
        }
        if ($role_freelactose->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($freelactose_pro_d);
        }
        $freelactose_pro_d->delete();

        $underexpire_pro_d = Permission::where('name', 'underexpire_pro_' . $id)->first();
        $role_underexpire = Permission_role::where('permission_id', $underexpire_pro_d->id)->first();
        if ($role_underexpire->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($underexpire_pro_d);
        }
        if ($role_underexpire->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($underexpire_pro_d);
        }
        if ($role_underexpire->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($underexpire_pro_d);
        }
        if ($role_underexpire->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($underexpire_pro_d);
        }
        $underexpire_pro_d->delete();

        $attribute_category_pro_d = Permission::where('name', 'attribute_category_pro_' . $id)->first();
        $role_attributecat = Permission_role::where('permission_id', $attribute_category_pro_d->id)->first();
        if ($role_attributecat->role_id == $product_role_v->id) {
            $product_role_v->perms()->detach($attribute_category_pro_d);
        }
        if ($role_attributecat->role_id == $product_role_c->id) {
            $product_role_c->perms()->detach($attribute_category_pro_d);
        }
        if ($role_attributecat->role_id == $product_role_s->id) {
            $product_role_s->perms()->detach($attribute_category_pro_d);
        }
        if ($role_attributecat->role_id == $product_role_e->id) {
            $product_role_e->perms()->detach($attribute_category_pro_d);
        }
        $attribute_category_pro_d->delete();


        $publications = Products_publication::where('product_id', $id)->get();
        foreach ($publications as $publication) {

            $attach_path = "/uploads/" . $publication->attachment;  // Value is not URL but directory file path
            if (file_exists($attach_path)) {
                unlink($attach_path);
            }
            $publication->delete();
        }


        return response()->json(['success' => 'true']);
    }
}

