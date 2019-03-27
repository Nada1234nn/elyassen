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
            <h3 class="dash-main-title col-12 wow fadeIn"><i class="fa fa-plus"></i>إضافة منتج جديد<span
                        class="dash-title-span">(شاشة إدخال/تعديل بيانات صنف)</span></h3>
        </div>
    </div>
    <div class="add-product-form margin-div2">
        <div class="container">
            <form class="needs-validation" novalidate>
                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        العنوان
                    </div>
                    <div class="form-group col-md-6">
                        الصلاحيات
                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>إسم المنتج</label>
                        <input type="text" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل إسم المنتج
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
                        <label>إسم المورد</label>
                        <select class="form-control" required>
                            <option>إسم المورد</option>
                            <option>إسم المورد</option>
                            <option>إسم المورد</option>
                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر إسم المورد
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio5" value="option5">
                            <label class="form-check-label custom-control-label" for="inlineRadio5">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio6" value="option6">
                            <label class="form-check-label custom-control-label" for="inlineRadio6">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio7" value="option7">
                            <label class="form-check-label custom-control-label" for="inlineRadio7">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio8" value="option8">
                            <label class="form-check-label custom-control-label" for="inlineRadio8">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>فئة المنتج</label>
                        <select class="form-control" required>
                            <option>فئة المنتج</option>
                            <option>فئة المنتج</option>
                            <option>فئة المنتج</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر فئة المنتج
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
                        <label>وصف المنتج</label>
                        <textarea class="form-control" required></textarea>
                        <div class="invalid-feedback">
                            من فضلك أدخل وصف المنتج
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


                <!--end row-->

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>تمييز المنتج</label>
                        <select class="form-control" required>
                            <option>تمييز المنتج</option>
                            <option>تمييز المنتج</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك إختر تمييز المنتج
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio13" value="option13">
                            <label class="form-check-label custom-control-label" for="inlineRadio3">v</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio14" value="option14">
                            <label class="form-check-label custom-control-label" for="inlineRadio14">c</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio15" value="option15">
                            <label class="form-check-label custom-control-label" for="inlineRadio15">s</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-control-input" type="checkbox"
                                   name="inlineRadioOptions" id="inlineRadio16" value="option16">
                            <label class="form-check-label custom-control-label" for="inlineRadio16">e</label>
                        </div>

                    </div>
                </div>
                <!--end row-->

                <div class="row">
                    <h3 class="dash-main-title colored-title-pro col-12 wow fadeIn"><i class="fa fa-plus"></i>إضافة
                        معلومات المنتج<span class="dash-title-span">(مواصفات  المنتج)</span></h3>
                </div>

                <!--start row-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>وزن المنتج</label>
                        <input type="number" class="form-control" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل وزن المنتج
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
                        <label>تعبئة المنتج</label>
                        <textarea class="form-control" placeholder="وصف العبوة" required></textarea>
                        <div class="invalid-feedback">
                            من فضلك أدخل تعبئة المنتج
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