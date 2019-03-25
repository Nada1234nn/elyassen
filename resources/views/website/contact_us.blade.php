@extends('website.layouts.layout')
@section('content')
<!--start pages-header
            ================-->

<section class="pages-header text-center ">
    <div class="container">
        <div class="row">
            <h3 class="dark-title center-border-title border-title col-12 wow fadeIn">{{trans('local.contact_us')}}</h3>
        </div>
    </div>
</section>
<!--end pages-header-->



<!--start about-pg
      ================-->

<section class="about-pg margin-div gray-bg">
    <div class="container">
        <div class="row">
            <!--contact-map-grid-->
            <div class="col-lg-6  contact-map-grid res-marg wow fadeIn">
                <div class="map3 wow fadeIn">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=%D8%A7%D9%84%D8%A7%D8%AD%D8%B3%D8%A7%D8%A1-%D8%A7%D9%84%D9%87%D9%81%D9%88%D9%81-%D8%B4%D8%A7%D8%B1%D8%B9%20%D8%A7%D9%84%D9%85%D9%84%D9%83%20%D8%B9%D8%A8%D8%AF%20%D8%A7%D9%84%D8%B9%D8%B2%D9%8A%D8%B2&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            Google Maps by <a href="https://www.embedgooglemap.net" rel="nofollow" target="_blank"></a></div>
                    </div>
                    <div class="social-icons-list pos-list">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-snapchat"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end contact-map-grid-->

            <!--start left-consult-->
            <div class="col-lg-6  about-descripe wow fadeIn">
                <div class="contact-pg-info">
                    <h3 class="contact-title border-title">{{trans('local.contact_us')}}</h3>
                    <div class="contact-information wow fadeIn">
                        <ul class="list-unstyled contact-list">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                الاحساء-الهفوف-شارع الملك عبد العزيز
                            </li>

                            <li>
                                <i class="fa fa-phone"></i>
                                +966138511714

                            </li>

                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <a href="mailto:info@alyaseenagri.com ">info@alyaseenagri.com </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="left-consult wow fadeIn">
                    <h3 class="contact-title border-title"> {{trans('local.contact_elyassen')}}</h3>
                    <form class="needs-validation icons-form row contact_us" onsubmit="return false;" novalidate>

                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <div class="form-group col-12">
                            <input type="text" class="form-control" id="name" placeholder="{{trans('local.name')}}" required>
                            <i class="fa fa-user main-form-icon"></i>
                            <span class="cu-lb"></span>
                            <div class="invalid-feedback">
                                من فضلك أدخل اسم صحيح
                            </div>
                        </div>



                        <div class="form-group col-12">
                            <input type="email" class="form-control" aria-describedby="emailHelp" id="email" placeholder="{{trans('local.email')}}" required>
                            <i class="fa fa-envelope main-form-icon"></i>
                            <span class="cu-lb"></span>
                            <div class="invalid-feedback">
                                من فضلك أدخل بريد الكتروني صحيح
                            </div>
                        </div>



                        <div class="form-group col-12">
                            <input type="text" class="form-control" placeholder=" {{trans('local.title_message')}}" id="title_message" required>
                            <i class="fa fa-envelope-o main-form-icon"></i>
                            <div class="invalid-feedback">
                                من فضلك أدخل عنوان الرسالة
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <textarea class="form-control" placeholder="{{trans('local.message')}}" id="message" required></textarea>
                            <i class="fa fa-file-text-o main-form-icon"></i>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص الرسالة
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
