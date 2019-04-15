@extends('website.layouts.layout')

@section('content')
    <!--start pages-header
             ================-->

    <section class="pages-header text-center marterial-header">
        <div class="container">
            <div class="row">
                <h3 class="dark-title center-border-title border-title col-12 wow fadeIn"> {{trans('local.request_price')}}</h3>
            </div>
        </div>
    </section>
    <!--end pages-header-->



    <!--start about-pg
          ================-->

    <section class="about-pg margin-div gray-bg">
        <div class="container">
            <div class="row">
                <!--start right-consult-->
                <div class="col-lg-6  about-descripe res-marg wow fadeIn">
                    <div class="right-consult wow fadeIn">
                        <h2 class="wow fadeIn">{{trans('local.req_order')}}</h2>
                        <p class="wow fadeIn">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص
                            من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                            زيادة عدد الحروف التى يولدها التطبيق</p>
                    </div>
                </div>
                <!--end right-consult-->
                <!--start left-consult-->
                <div class="col-lg-6  about-descripe wow fadeIn">
                    <div class="left-consult wow fadeIn">
                        <form class="needs-validation icons-form row request_order" enctype="multipart/form-data"
                              novalidate>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">

                            <div class="form-group col-12">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="{{trans('local.name')}}" required>
                                <i class="fa fa-user main-form-icon"></i>
                                <span class="cu-lb"></span>
                                <div class="invalid-feedback">
                                    من فضلك أدخل اسم صحيح
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <input type="tel" class="form-control" id="phone" minlength="10" name="phone"
                                       maxlength="14" required>
                                <div class="invalid-feedback">
                                    من فضلك أدخل رقم صحيح
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <select class="form-control" id="area" name="area" required>
                                    <option value="1"> {{trans('local.area')}}</option>
                                    <option value="2">{{trans('local.riyad')}}</option>
                                    <option value="3">{{trans('local.Jeddah')}}</option>
                                    <option value="4">{{trans('local.baha')}}</option>
                                </select>
                                <i class="fa fa-map-marker main-form-icon"></i>
                                <span class="cu-lb"></span>
                                <div class="invalid-feedback">
                                    من فضلك أختار منطقة صحيح
                                </div>
                            </div>

                            <div class="form-group col-12 map-form-group">
                                <input type="text" class="form-control" placeholder="{{trans('local.location')}}"
                                       id="address" name="address" required>
                                <input id="location" name="location" type="hidden" class="location" value="">

                                <input id="latitude" name="lat" type="hidden" class="lat" value="">

                                <input id="longitude" name="lng" type="hidden" class="lng" value="">
                                <i class="fa fa-map main-form-icon"></i>
                                <div class="map wow fadeIn">
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe id="gmap_canvas"
                                                    src="https://maps.google.com/maps?q=%D8%A7%D9%84%D8%A7%D8%AD%D8%B3%D8%A7%D8%A1-%D8%A7%D9%84%D9%87%D9%81%D9%88%D9%81-%D8%B4%D8%A7%D8%B1%D8%B9%20%D8%A7%D9%84%D9%85%D9%84%D9%83%20%D8%B9%D8%A8%D8%AF%20%D8%A7%D9%84%D8%B9%D8%B2%D9%8A%D8%B2&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                    frameborder="0" scrolling="no" marginheight="0"
                                                    marginwidth="0"></iframe>
                                            Google Maps by <a href="https://www.embedgooglemap.net" rel="nofollow"
                                                              target="_blank"></a></div>
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    من فضلك حدد الموقع
                                </div>
                            </div>



                            <div class="form-group col-12">
                                <input type="email" class="form-control" aria-describedby="emailHelp" name="email"
                                       id="email" placeholder="{{trans('local.email')}} " required>
                                <i class="fa fa-envelope main-form-icon"></i>
                                <span class="cu-lb"></span>
                                <div class="invalid-feedback">
                                    من فضلك أدخل بريد الكتروني صحيح
                                </div>
                            </div>



                            <div class="form-group col-12">
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button search-btn2" id="fileName"><i
                                                    class="fa fa-link"></i></div>
                                        <div class="file-select-name" id="noFile"> {{trans('local.attach_files')}}</div>
                                        <input type="file" name="chooseFile" class="form-control" id="chooseFile">
                                        <i class="fa fa-upload main-form-icon"></i>
                                        <div class="invalid-feedback">
                                            من فضلك أرفق الملفات
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <textarea class="form-control" id="information_additional" name="information_additional"
                                          placeholder="  {{trans('local.information_additional')}}" required></textarea>
                                <i class="fa fa-file-text-o main-form-icon"></i>
                                <div class="invalid-feedback">
                                    من فضلك أدخل الوصف
                                </div>
                            </div>


                            <div class="form-group left-btn submit-form-group col-12">
                                <button type="submit" class="dark_btn custom_btn">{{trans('local.send')}}</button>
                            </div>


                        </form>
                    </div>
                </div>
                <!--start left-consult-->

            </div>
        </div>
    </section>

    <!--end about-pg-->
@endsection