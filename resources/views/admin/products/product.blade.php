@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('products.index')}}">{{trans('local.products')}}</a>
                    {{isset($product)?trans('local.edit_product'):trans('local.add_product')}}
                </div>
            </div>
        </div>
    </div>
    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">
            <h3 class="dash-main-title col-12 wow fadeIn"><i class="fa fa-plus"></i>{{trans('local.add_newproduct')}}
                <span
                        class="dash-title-span">({{trans('local.screen_input')}})</span></h3>
        </div>
    </div>
    <div class="add-product-form margin-div2">
        <div class="container">
            <form class="needs-validation" id="myForm" method="post"
                  action="{{ isset($product)? route('products.update',$product->id):route('products.store')}}"
                  novalidate="novalidate" enctype="multipart/form-data">

                {!! csrf_field() !!}
                @if(isset($product))
                    <input type="hidden" name="_method" value="PATCH"/>
            @endif

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        {{trans('local.address')}}
                    </div>
                    <div class="form-group col-md-6">
                        {{trans('local.permissions')}}
                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>{{trans('local.name_product')}}</label>
                        <input type="text" name="name" value="{{isset($product)?$product->name:''}}"
                               class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل إسم المنتج
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>{{trans('local.en_name_product')}}</label>
                        <input type="text" name="en_name" value="{{isset($product)?$product->en_name:''}}"
                               class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل إسم المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="name_v_pro" value="1" name="name_v_pro" onchange=""
                                    {{isset($role_per_name)&&$role_per_name->role_id==$product_role_v->id?'checked':''}}>

                            <label class="form-check-label custom-control-label" for="name_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="name_c_pro" value="1" name="name_c_pro"
                                    {{isset($role_per_name)&&$role_per_name->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="name_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="name_s_pro" value="1" name="name_s_pro"
                                    {{isset($role_per_name)&&$role_per_name->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="name_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="name_e_pro" value="1" name="name_e_pro"
                                    {{isset($role_per_name)&&$role_per_name->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="name_e_pro">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.price_product')}}</label>
                        <input type="text" name="price" value="{{isset($product)?$product->price:''}}"
                               class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل إسم المنتج
                        </div>
                    </div>

                    {{--<div class="form-group col-md-6">--}}
                    {{--<div class="form-check form-check-inline">--}}
                    {{--<input class="form-check-input custom-control-input" type="checkbox"--}}
                    {{--id="price_v_pro" value="1" name="price_v_pro" onchange=""--}}
                    {{--{{isset($role_per_price)&&$role_per_price->role_id==$product_role_v->id?'checked':''}}>--}}

                    {{--<label class="form-check-label custom-control-label" for="price_v_pro">v</label>--}}
                    {{--</div>--}}

                    {{--<div class="form-check form-check-inline">--}}
                    {{--<input class="form-check-input custom-control-input" type="checkbox"--}}
                    {{--id="price_c_pro" value="1" name="price_c_pro"--}}
                    {{--{{isset($role_per_price)&&$role_per_price->role_id==$product_role_c->id?'checked':''}}>--}}
                    {{--<label class="form-check-label custom-control-label" for="price_c_pro">c</label>--}}
                    {{--</div>--}}

                    {{--<div class="form-check form-check-inline">--}}
                    {{--<input class="form-check-input custom-control-input" type="checkbox"--}}
                    {{--id="price_s_pro" value="1" name="price_s_pro"--}}
                    {{--{{isset($role_per_price)&&$role_per_price->role_id==$product_role_s->id?'checked':''}}>--}}
                    {{--<label class="form-check-label custom-control-label" for="price_s_pro">s</label>--}}
                    {{--</div>--}}

                    {{--<div class="form-check form-check-inline">--}}
                    {{--<input class="form-check-input custom-control-input" type="checkbox"--}}
                    {{--id="price_e_pro" value="1" name="price_e_pro"--}}
                    {{--{{isset($role_per_price)&&$role_per_price->role_id==$product_role_e->id?'checked':''}}>--}}
                    {{--<label class="form-check-label custom-control-label" for="price_e_pro">e</label>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.quantity')}}</label>
                        <input type="number" name="quantity" value="{{isset($product)?$product->quantity:''}}"
                               class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل إسم المنتج
                        </div>
                    </div>

                    {{--<div class="form-group col-md-6">--}}
                    {{--<div class="form-check form-check-inline">--}}
                    {{--<input class="form-check-input custom-control-input" type="checkbox"--}}
                    {{--id="quantity_v_pro" value="1" name="quantity_v_pro" onchange=""--}}
                    {{--{{isset($role_per_quantity)&&$role_per_quantity->role_id==$product_role_v->id?'checked':''}}>--}}

                    {{--<label class="form-check-label custom-control-label" for="quantity_v_pro">v</label>--}}
                    {{--</div>--}}

                    {{--<div class="form-check form-check-inline">--}}
                    {{--<input class="form-check-input custom-control-input" type="checkbox"--}}
                    {{--id="quantity_c_pro" value="1" name="quantity_c_pro"--}}
                    {{--{{isset($role_per_quantity)&&$role_per_quantity->role_id==$product_role_c->id?'checked':''}}>--}}
                    {{--<label class="form-check-label custom-control-label" for="quantity_c_pro">c</label>--}}
                    {{--</div>--}}

                    {{--<div class="form-check form-check-inline">--}}
                    {{--<input class="form-check-input custom-control-input" type="checkbox"--}}
                    {{--id="quantity_s_pro" value="1" name="quantity_s_pro"--}}
                    {{--{{isset($role_per_quantity)&&$role_per_quantity->role_id==$product_role_s->id?'checked':''}}>--}}
                    {{--<label class="form-check-label custom-control-label" for="quantity_s_pro">s</label>--}}
                    {{--</div>--}}

                    {{--<div class="form-check form-check-inline">--}}
                    {{--<input class="form-check-input custom-control-input" type="checkbox"--}}
                    {{--id="quantity_e_pro" value="1" name="quantity_e_pro"--}}
                    {{--{{isset($role_per_quantity)&&$role_per_quantity->role_id==$product_role_e->id?'checked':''}}>--}}
                    {{--<label class="form-check-label custom-control-label" for="quantity_e_pro">e</label>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                </div>
                <!--end row-->


                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.name_supplier')}}</label>
                        <select class="form-control" name="supplier_id" required>
                            <option>{{trans('local.chooseName_supplier')}} </option>

                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}" {{isset($product)&&$product->supplier_id == $supplier->id?'selected':''}}>{{$supplier->getUser->username}} </option>

                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر إسم المورد
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="supplier_v_pro" value="1" name="supplier_v_pro"
                                    {{isset($role_per_v_supplier)&&$role_per_v_supplier->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="supplier_v_pro">v</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="supplier_c_pro" value="1" name="supplier_c_pro"
                                    {{isset($role_per_v_supplier)&&$role_per_v_supplier->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="supplier_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="supplier_s_pro" value="1" name="supplier_s_pro"
                                    {{isset($role_per_v_supplier)&&$role_per_v_supplier->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="supplier_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="supplier_e_pro" value="1" name="supplier_e_pro"
                                    {{isset($role_per_v_supplier)&&$role_per_v_supplier->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="supplier_e_pro">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>{{trans('local.chooseMain_categoryproduct')}} </label>
                        <select class="form-control category_id" name="category_id" required>
                            <option>{{trans('local.chooseMain_categoryproduct')}} </option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{isset($product)&&$product->category_id == $category->id?'selected':''}}>{{$category->name}} </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر فئة المنتج
                        </div>
                    </div>

                    <div class="form-group col-md-3 sub_category_id" id="sub_category_id">

                        @if(isset($product->subcategory_id))
                            <label>{{trans('local.subcategory_choose')}}</label>
                            <select class="form-control category_id" name="subcategory_id">
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                من فضلك إختر فئة المنتج
                            </div>
                        @endif

                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="category_v_pro" value="1" name="category_v_pro"
                                    {{isset($role_per_cat)&&$role_per_cat->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="category_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="category_c_pro" value="1" name="category_c_pro"
                                    {{isset($role_per_cat)&&$role_per_cat->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="category_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="category_s_pro" value="1" name="category_s_pro"
                                    {{isset($role_per_cat)&&$role_per_cat->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="category_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="category_e_pro" value="1" name="category_e_pro"
                                    {{isset($role_per_cat)&&$role_per_cat->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="category_e_pro">e</label>
                        </div>
                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.descr_pro')}}</label>
                        <textarea class="form-control" name="descr"
                                  required>{{isset($product)?$product->descr:''}}</textarea>
                        <div class="invalid-feedback">
                            من فضلك أدخل وصف المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="descr_v_pro" value="1" name="descr_v_pro"
                                    {{isset($role_per_v_descr)&&$role_per_v_descr->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="descr_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="descr_c_pro" value="1" name="descr_c_pro"
                                    {{isset($role_per_v_descr)&&$role_per_v_descr->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="descr_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="descr_s_pro" value="1" name="descr_s_pro"
                                    {{isset($role_per_v_descr)&&$role_per_v_descr->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="descr_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="descr_e_pro" value="1" name="descr_e_pro"
                                    {{isset($role_per_v_descr)&&$role_per_v_descr->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="descr_e_pro">e</label>
                        </div>
                    </div>
                </div>
                <!--end row-->

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.descr_en_pro')}}</label>
                        <textarea class="form-control" name="descr_en"
                                  required>{{isset($product)?$product->descr_en:''}}</textarea>
                        <div class="invalid-feedback">
                            من فضلك أدخل وصف المنتج
                        </div>
                    </div>
                </div>

                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.discrimintation_pro')}}</label>
                        <select class="form-control" name="sorting" required>
                            {{--                            <option>{{trans('local.choose_discrimintationpro')}}</option>--}}
                            <option value="1" {{isset($product) && $product->sorting==1?'selected':''}}>{{trans('local.discrimintation_pro_1')}}</option>
                            <option value="2" {{isset($product) && $product->sorting==2?'selected':''}}>{{trans('local.discrimintation_pro_2')}} </option>
                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر تمييز المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="sorting_v_pro" value="1" name="sorting_v_pro"
                                    {{isset($role_sort)&&$role_sort->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="sorting_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="sorting_c_pro" value="1" name="sorting_c_pro"
                                    {{isset($role_sort)&&$role_sort->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="sorting_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="sorting_s_pro" value="1" name="sorting_s_pro"
                                    {{isset($role_sort)&&$role_sort->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="sorting_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="sorting_e_pro" value="1" name="sorting_e_pro"
                                    {{isset($role_sort)&&$role_sort->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="sorting_e_pro">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <div class="row">
                    <h3 class="dash-main-title colored-title-pro col-12 wow fadeIn"><i class="fa fa-plus"></i>
                        {{trans('local.insert_informationpro')}} <span
                                class="dash-title-span">({{trans('local.descriptions_pro')}})</span></h3>
                </div>

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.weight_pro')}} </label>
                        <input type="number" name="weight_product"
                               value="{{isset($product)?$product->weight_product:''}}" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل وزن المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="weight_v_pro" value="1" name="weight_v_pro"
                                    {{isset($role_weight)&&$role_weight->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="weight_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="weight_c_pro" value="1" name="weight_c_pro"
                                    {{isset($role_weight)&&$role_weight->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="weight_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="weight_s_pro" value="1"
                                   name="weight_s_pro" {{isset($role_weight)&&$role_weight->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="weight_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="weight_e_pro" value="1"
                                   name="weight_e_pro" {{isset($role_weight)&&$role_weight->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="weight_e_pro">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.fill_pro')}}</label>
                        <textarea class="form-control" name="fill_product"
                                  required>{{isset($product)?$product->fill_product:''}}</textarea>
                        <div class="invalid-feedback">
                            من فضلك أدخل تعبئة المنتج
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="fill_v_pro" value="1"
                                   name="fill_v_pro" {{isset($role_fill)&&$role_fill->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="fill_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="fill_c_pro" value="1"
                                   name="fill_c_pro" {{isset($role_fill)&&$role_fill->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="fill_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="fill_s_pro" value="1"
                                   name="fill_s_pro" {{isset($role_fill)&&$role_fill->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="fill_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="fill_e_pro" value="1"
                                   name="fill_e_pro" {{isset($role_fill)&&$role_fill->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="fill_e_pro">e</label>
                        </div>
                    </div>
                </div>
                <!--end row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.fill_pro_en')}}</label>
                        <textarea class="form-control" name="fill_product_en"
                                  required>{{isset($product)?$product->fill_product_en:''}}</textarea>
                        <div class="invalid-feedback">
                            من فضلك أدخل تعبئة المنتج
                        </div>
                    </div>

                </div>

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>{{trans('local.color_pro')}}</label>
                        <input type="text" class="form-control" name="color_product"
                               value="{{isset($product)?$product->color_product:''}}" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل لون المنتج
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>{{trans('local.color_pro_en')}}</label>
                        <input type="text" class="form-control" name="color_product_en"
                               value="{{isset($product)?$product->color_product_en:''}}" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل لون المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="color_v_pro" value="1"
                                   name="color_v_pro" {{isset($role_color)&&$role_color->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="color_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="color_c_pro" value="1"
                                   name="color_c_pro" {{isset($role_color)&&$role_color->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="color_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="color_s_pro" value="1"
                                   name="color_s_pro" {{isset($role_color)&&$role_color->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="color_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="color_e_pro" value="1"
                                   name="color_e_pro" {{isset($role_color)&&$role_color->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="color_e_pro">e</label>
                        </div>
                    </div>
                </div>
                <!--end row-->


                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.organic')}}</label>
                        <select class="form-control" name="organic" required>
                            <option value="1"{{isset($product)&&$product->organic==1?'selected':''}}>{{trans('local.yes')}}</option>
                            <option value="2"{{isset($product)&&$product->organic==2?'selected':''}}>{{trans('local.no')}}</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر من القائمة
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="organic_v_pro" value="1"
                                   name="organic_v_pro" {{isset($role_organic)&&$role_organic->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="organic_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="organic_c_pro" value="1"
                                   name="organic_c_pro" {{isset($role_organic)&&$role_organic->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="organic_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="organic_s_pro" value="1"
                                   name="organic_s_pro" {{isset($role_organic)&&$role_organic->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="organic_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="organic_e_pro" value="1"
                                   name="organic_e_pro" {{isset($role_organic)&&$role_organic->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="organic_e_pro">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.free_sugar')}}</label>
                        <select class="form-control" name="free_sugar" required>
                            <option value="1" {{isset($product)&&$product->free_sugar==1?'selected':''}}>{{trans('local.yes')}}</option>
                            <option value="2" {{isset($product)&&$product->free_sugar==2?'selected':''}}>
                                {{trans('local.no')}}</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر من القائمة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="freesugar_v_pro" value="1"
                                   name="freesugar_v_pro" {{isset($role_freesugar)&&$role_freesugar->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="freesugar_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="freesugar_c_pro" value="1"
                                   name="freesugar_c_pro" {{isset($role_freesugar)&&$role_freesugar->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="freesugar_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="freesugar_s_pro" value="1"
                                   name="freesugar_s_pro" {{isset($role_freesugar)&&$role_freesugar->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="freesugar_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="freesugar_e_pro" value="1"
                                   name="freesugar_e_pro" {{isset($role_freesugar)&&$role_freesugar->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="freesugar_e_pro">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.free_lactose')}}</label>
                        <select class="form-control" name="free_lactose" required>
                            <option value="1" {{isset($product)&&$product->free_lactose==1?'selected':''}}>{{trans('local.yes')}}</option>
                            <option value="2" {{isset($product)&&$product->free_lactose==2?'selected':''}}>
                                {{trans('local.no')}}</option>


                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر من القائمة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="freelactose_v_pro" value="1"
                                   name="freelactose_v_pro" {{isset($role_freelactose)&&$role_freelactose->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="freelactose_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="freelactose_c_pro" value="1"
                                   name="freelactose_c_pro" {{isset($role_freelactose)&&$role_freelactose->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="freelactose_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="freelactose_s_pro" value="1"
                                   name="freelactose_s_pro" {{isset($role_freelactose)&&$role_freelactose->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="freelactose_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="freelactose_e_pro" value="1"
                                   name="freelactose_e_pro" {{isset($role_freelactose)&&$role_freelactose->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="freelactose_e_pro">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.underexpire_pro')}}</label>
                        <select class="form-control" name="under_expire" required>
                            <option value="1" {{isset($product)&&$product->under_expire==1?'selected':''}}>{{trans('local.yes')}}</option>
                            <option value="2" {{isset($product)&&$product->under_expire==2?'selected':''}}>
                                {{trans('local.no')}}</option>


                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر من القائمة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="underexpire_v_pro" value="1"
                                   name="underexpire_v_pro" {{isset($role_underexpire)&&$role_underexpire->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="underexpire_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="underexpire_c_pro" value="1"
                                   name="underexpire_c_pro" {{isset($role_underexpire)&&$role_underexpire->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="underexpire_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="underexpire_s_pro" value="1"
                                   name="underexpire_s_pro" {{isset($role_underexpire)&&$role_underexpire->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="underexpire_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="underexpire_e_pro" value="1"
                                   name="underexpire_e_pro" {{isset($role_underexpire)&&$role_underexpire->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="underexpire_e_pro">e</label>
                        </div>

                    </div>
                </div>

                <div class="row attribute_category" id="attribute_category">
                    <?php $i = 0?>
                    @if($attribures_product)
                        @foreach($attribures_product as $attribure_pro)
                            <div class="form-group col-md-3">
                                <label for="">{{$attribure_pro["name"]}}</label>
                                <input type="text" class="form-control" name="values[]"
                                       value="{{$attribure_pro["pivot"]["attribute_value"]}}">
                                <input type="hidden" name="IDs[]" value="">
                                <div class="invalid-feedback">
                                    من فضلك أدخل لون المنتج
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">{{$attribure_pro["en_name"]}}</label>
                                <input type="text" class="form-control" name="values_en[]"
                                       value="{{$attribure_pro["pivot"]["attribute_value_en"]}}">
                                <input type="hidden" name="IDs[]" value="{{$i++}}">
                                <div class="invalid-feedback">
                                    من فضلك أدخل لون المنتج
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-control-input" type="checkbox"
                                       id="attribute_category_v_pro" value="1"
                                       name="attribute_category_v_pro" {{isset($role_attributecat)&&$role_attributecat->role_id==$product_role_v->id?'checked':''}}>
                                <label class="form-check-label custom-control-label"
                                       for="attribute_category_v_pro">v</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-control-input" type="checkbox"
                                       id="attribute_category_c_pro" value="1"
                                       name="attribute_category_c_pro" {{isset($role_attributecat)&&$role_attributecat->role_id==$product_role_c->id?'checked':''}}>
                                <label class="form-check-label custom-control-label"
                                       for="attribute_category_c_pro">c</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-control-input" type="checkbox"
                                       id="attribute_category_s_pro" value="1"
                                       name="attribute_category_s_pro" {{isset($role_attributecat)&&$role_attributecat->role_id==$product_role_s->id?'checked':''}}>
                                <label class="form-check-label custom-control-label"
                                       for="attribute_category_s_pro">s</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-control-input" type="checkbox"
                                       id="attribute_category_e_pro" value="1"
                                       name="attribute_category_e_pro" {{isset($role_attributecat)&&$role_attributecat->role_id==$product_role_e->id?'checked':''}}>
                                <label class="form-check-label custom-control-label"
                                       for="attribute_category_e_pro">e</label>
                            </div>
                            '
                        </div>
                    @endif
                </div>

                <div class="row">
                    <h3 class="dash-main-title colored-title-pro col-12 wow fadeIn"><i
                                class="fa fa-plus"></i>{{trans('local.insert_imagespro')}}
                    </h3>
                </div>

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('local.attach_mainphoto')}}</label>
                        <input type="file" name="main_image" id="chooseFile" onchange="readURL(this);"
                               value="{{$product->image}}"
                               class="form-control" {{isset($product)?:'required'}}>
                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="mainphoto_v_pro" value="1"
                                   name="mainphoto_v_pro" {{isset($role_mainphoto)&&$role_mainphoto->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="mainphoto_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="mainphoto_c_pro" value="1"
                                   name="mainphoto_c_pro" {{isset($role_mainphoto)&&$role_mainphoto->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="mainphoto_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="mainphoto_s_pro" value="1"
                                   name="mainphoto_s_pro" {{isset($role_mainphoto)&&$role_mainphoto->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="mainphoto_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="mainphoto_e_pro" value="1"
                                   name="mainphoto_e_pro" {{isset($role_mainphoto)&&$role_mainphoto->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="mainphoto_e_pro">e</label>
                        </div>


                    </div>
                </div>
                <!--end row-->

                <div class="row">
                    <div class="form-group col-6">
                        @if(isset($product))
                        <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;
                    display: block;" align="center" src="{{asset('uploads/'.$product->image)}}"
                             alt=""/>
                        @endif

                    </div>
                </div>
                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> {{trans('local.attach_photospro')}}</label>
                        {{--<input type="file" name="images[]" value="" class="form-control" required multiple>--}}

                        {{--<input type="file" id="files" name="attachment[]" multiple>--}}
                        <input type="file" id="file" multiple="multiple" class="file-input" accept="image/*"
                               name="productImages[]">

                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="subphotos_v_pro" value="1"
                                   name="subphotos_v_pro" {{isset($role_subphotos)&&$role_subphotos->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="subphotos_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="subphotos_c_pro" value="1"
                                   name="subphotos_c_pro" {{isset($role_subphotos)&&$role_subphotos->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="subphotos_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="subphotos_s_pro" value="1"
                                   name="subphotos_s_pro" {{isset($role_subphotos)&&$role_subphotos->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="subphotos_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="subphotos_e_pro" value="1"
                                   name="subphotos_e_pro" {{isset($role_subphotos)&&$role_subphotos->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="subphotos_e_pro">e</label>
                        </div>


                    </div>
                </div>
                <!--end row-->

                <div class="row" id="files-wrapper">
                    @if($images_product)
                        @foreach($images_product as $image_product)
                            <div id="img">
                                <a href='#' data-index='%d' title=' delete ' class='delete-img'>
                                    <img src='https://cdn4.iconfinder.com/data/icons/simplicio/32x32/notification_error.png'
                                         alt=''/>
                                </a>
                                <img class="image-preview" src="{{asset('uploads/'.$image_product->image)}}"
                                     alt=""/>
                            </div>&nbsp


                        @endforeach
                    @endif


                </div>


                <!--end row-->
                <div class="row">
                    <h3 class="dash-main-title colored-title-pro col-12 wow fadeIn"><i
                                class="fa fa-plus"></i>{{trans('local.attach_publications')}}
                    </h3>
                </div>

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> {{trans('local.attach_publication')}}</label>
                        <input type="file" name="attachment[]" value="" class="form-control" multiple>
                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="attachents_v_pro" value="1"
                                   name="attachents_v_pro" {{isset($role_attach)&&$role_attach->role_id==$product_role_v->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="attachents_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="attachents_c_pro" value="1"
                                   name="attachents_c_pro" {{isset($role_attach)&&$role_attach->role_id==$product_role_c->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="attachents_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="attachents_s_pro" value="1"
                                   name="attachents_s_pro" {{isset($role_attach)&&$role_attach->role_id==$product_role_s->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="attachents_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="attachents_e_pro" value="1"
                                   name="attachents_e_pro" {{isset($role_attach)&&$role_attach->role_id==$product_role_e->id?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="attachents_e_pro">e</label>
                        </div>


                    </div>

                    {{--<div class="row">--}}
                    @if($publications_product)
                        @foreach($publications_product as $publication_product)
                            {{--<div >--}}
                            {{--<a href='#' data-index='%d' title=' delete ' class='delete-image'>--}}
                            {{--<img src='https://cdn4.iconfinder.com/data/icons/simplicio/32x32/notification_error.png' alt=''/>--}}
                            {{--</a>--}}
                            {{--<img class="image-preview" src="{{asset('uploads/'.$publication_product->attachment)}}"--}}
                            {{--alt=""/>--}}
                            {{--</div>--}}
                            {{--&nbsp--}}
                            <label>{{asset('uploads/'.$publication_product->attachment)}}</label>
                        @endforeach
                    @endif
                    {{--</div>--}}

                </div>
                <!--end row-->





                <div class="text-center form-group col-12">
                    <button type="submit"
                            class="custom_btn dark-btn"> {{isset($product)?trans('local.edit'):trans('local.save')}}</button>
                </div>

            </form>
        </div>

    </div>
@endsection