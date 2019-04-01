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
            <form class="needs-validation" method="post" enctype="multipart/form-data"
                  action="{{ isset($product)? route('products.update',$product->id):route('products.store')}}"
                  novalidate>
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
                        <input type="text" name="name" value="{{isset($product)?$product->nane:''}}"
                               class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل إسم المنتج
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>{{trans('local.en_name_product')}}</label>
                        <input type="text" name="en_name" value="{{isset($product)?$product->en_nane:''}}"
                               class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل إسم المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="name_v_pro" value="1" name="name_v_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="name_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="name_c_pro" value="1" name="name_c_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="name_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="name_s_pro" value="1" name="name_s_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="name_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="name_e_pro" value="1" name="name_e_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="name_e_pro">e</label>
                        </div>

                    </div>
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
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="supplier_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="supplier_c_pro" value="1" name="supplier_c_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="supplier_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="supplier_s_pro" value="1" name="supplier_s_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="supplier_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="supplier_e_pro" value="1" name="supplier_e_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
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
                    <div class="form-group col-md-3 sub_category_id">

                        <div class="invalid-feedback">
                            من فضلك إختر فئة المنتج
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="category_v_pro" value="1" name="category_v_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="category_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="category_c_pro" value="1" name="category_c_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="category_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="category_s_pro" value="1" name="category_s_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="category_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="category_e_pro" value="1" name="category_e_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
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
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="descr_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="descr_c_pro" value="1" name="descr_c_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="descr_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="descr_s_pro" value="1" name="descr_s_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="descr_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="descr_e_pro" value="1" name="descr_e_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
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
                            <option>{{trans('local.choose_discrimintationpro')}}</option>
                            <option value="1" {{isset($product) && $product->sorting==1?'checked':''}}>{{trans('local.discrimintation_pro_1')}}</option>
                            <option value="2" {{isset($product) && $product->sorting==2?'checked':''}}>{{trans('local.discrimintation_pro_2')}} </option>
                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر تمييز المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="sorting_v_pro" value="1" name="sorting_v_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="sorting_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="sorting_c_pro" value="1" name="sorting_c_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="sorting_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="sorting_s_pro" value="1" name="sorting_s_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="sorting_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="sorting_e_pro" value="1" name="sorting_e_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
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
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="weight_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="weight_c_pro" value="1" name="weight_c_pro"
                                   onchange="this.form.submit()" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="weight_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="weight_s_pro" value="1"
                                   name="weight_s_pro" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="weight_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="weight_e_pro" value="1"
                                   name="weight_e_pro" {{isset($product_role)?'checked':''}}>
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
                                   id="fill_v_pro" value="1" name="fill_v_pro" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="fill_v_pro">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="fill_c_pro" value="1" name="fill_c_pro" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="fill_c_pro">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="fill_s_pro" value="1" name="fill_s_pro" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="fill_s_pro">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   id="fill_e_pro" value="1" name="fill_e_pro" {{isset($product_role)?'checked':''}}>
                            <label class="form-check-label custom-control-label" for="fill_e_pro">e</label>
                        </div>
                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>لون المنتج</label>
                        <input type="text" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل لون المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio1">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio2">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio3">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio4" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio4">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->


                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>عضوي</label>
                        <select class="form-control" required>
                            <option>نعم</option>
                            <option>لا</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر من القائمة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>خالي من السكر</label>
                        <select class="form-control" required>
                            <option>نعم</option>
                            <option>لا</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر من القائمة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>خالي من اللاكتوز</label>
                        <select class="form-control" required>
                            <option>نعم</option>
                            <option>لا</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر من القائمة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>يخضع لإنتهاء الصلاحية</label>
                        <select class="form-control" required>
                            <option>نعم</option>
                            <option>لا</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر من القائمة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <h3 class="dash-main-title colored-title-pro col-12 wow fadeIn"><i class="fa fa-plus"></i>إضافة صور
                        المنتج</h3>
                </div>

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>إرفاق صورة رقم 1</label>
                        <input type="file" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>إرفاق صورة رقم 2</label>
                        <input type="file" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->


                <!--start row-->
                <div class="row repeat-photo">
                    <div class="form-group col-md-6">
                        <label>إرفاق صورة أخري</label>
                        <input type="file" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <span class="add_files custom_btn dark_btn"><i class="fa fa-plus"></i>إضافة أخري</span>

                <!--end row-->

                <!--end row-->
                <div class="row">
                    <h3 class="dash-main-title colored-title-pro col-12 wow fadeIn"><i class="fa fa-plus"></i>إرفاق
                        النشرات الفنية</h3>
                </div>

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>إرفاق النشره الفنية 1</label>
                        <input type="file" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>إرفاق النشره فنية 2</label>
                        <input type="file" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row repeat-photo">
                    <div class="form-group col-md-6">
                        <label>إرفاق النشره فنية أخري</label>
                        <input type="file" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك حمل صوره صحيحة
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio9" value="option1">
                            <label class="form-check-label custom-control-label" for="inlineRadio9">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio10" value="option2">
                            <label class="form-check-label custom-control-label" for="inlineRadio10">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio11" value="option3">
                            <label class="form-check-label custom-control-label" for="inlineRadio11">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio12" value="option4">
                            <label class="form-check-label custom-control-label" for="inlineRadio12">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <span class="add_files custom_btn dark_btn"><i class="fa fa-plus"></i>إضافة أخري</span>


                <div class="text-center form-group col-12">
                    <button type="submit" class="custom_btn dark-btn"> حفظ</button>
                </div>

            </form>
        </div>

    </div>
@endsection