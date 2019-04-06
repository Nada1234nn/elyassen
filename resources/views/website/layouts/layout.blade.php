<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.  To change this template file, choose Tools | Templates

  and open the template in the editor.
-->
<html>
<head>
    <title>elyassen</title>
    <!--
      Meta tags
      ================
    -->
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}" />

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!--
      Style sheet
      ================
    -->

    @include('website.layouts.head')
</head>

<body>


<!--start login-model -->
<div class="modal fade" id="success-share-product-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>


            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-form">
                    <div class="inner-modal">
                        {{trans('local.share_success')}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--start login-model -->
<div class="modal fade" id="must-loginshare-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>


            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-form">
                    <div class="inner-modal">
                        {{trans('local.must_loginshare')}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--start login-model -->
<div class="modal fade" id="product-found-before-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>


            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-form">
                    <div class="inner-modal">
                        {{trans('local.product_found_before')}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@if(!Auth::User())
<!--start login-popup-->
<div class="login-popup">
    <!--start login-model -->
    <div class="modal fade" id="login-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal">&times;</button>


                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-form">
                        <h4 class="modal-title">{{trans('local.login')}}</h4>
                        <div class="inner-modal">
                            <div class="form-logo"><img src="{{asset('/public/images/main/logo.png')}}" alt="logo"/>
                            </div>
                            <h3 class="sign-note">{{trans('local.login_now')}} </h3>
                            <p class="sign-prg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى </p>

                            <form class="needs-validation row" method="post" action="{{ route("login") }}" novalidate>

                                @csrf
                                <div class="form-group  col-12">
                                    <label>{{trans('local.email')}}</label>
                                    <input type="email" class="form-control" id="email_input" name="email" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        من فضلك أدخل بريد الكتروني صحيح
                                    </div>
                                </div>



                                <div class="form-group  col-12">
                                    <label>{{trans('local.password')}}</label>
                                    <input type="password" class="form-control" id="password_input" name="password" required>
                                    <div class="invalid-feedback">
                                        من فضلك أدخل رقم سري صحيح
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <a href="forget-password.html" class="forget-link">{{trans('local.reset_password')}}</a>
                                </div>



                                <div class="form-group submit-form-group col-12">
                                    <button type="submit" class="green_btn custom_btn">{{trans('local.login_n')}}</button>
                                </div>


                                <div class="form-group social-login col-12">
                                    <h3 class="sign-note">{{trans('local.register_with')}} </h3>
                                    <a href="{{url('/login/facebook')}}" class="fc-icon"><i class="fa fa-facebook"></i></a>
                                    <a href="{{url('/login/google')}}" class="goo-icon"><i class="fa fa-google-plus"></i></a>
                                    <a href="{{url('/login/twitter')}}" class="tw-icon"><i class="fa fa-twitter"></i></a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end login-model -->


    <!--start register-model -->
    <div class="modal fade" id="register-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal">&times;</button>


                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-form">
                        <h4 class="modal-title">{{trans('local.new_user')}}</h4>
                        <div class="inner-modal">
                            <div class="form-logo"><img src="images/main/logo.png" alt="logo" /></div>
                            <h3 class="sign-note">{{trans('local.start_register')}}</h3>
                            <p class="sign-prg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى </p>
                            <form class="needs-validation row" method="POST" action="{{ route('register') }}" novalidate>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">

                                <div class="form-group col-12">
                                    <input type="text" class="form-control" id="name_input" placeholder="{{trans('local.username')}}" name="name" required>
                                    <div class="invalid-feedback">
                                        من فضلك أدخل اسم صحيح
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <input type="email" class="form-control" id="email_input2" aria-describedby="emailHelp" placeholder="{{trans('local.email')}}" name="email" required>
                                    <div class="invalid-feedback">
                                        من فضلك أدخل بريد الكتروني صحيح
                                    </div>
                                </div>



                                <div class="form-group col-12">
                                    <input type="password" class="form-control" id="password_input2" name="password" placeholder="{{trans('local.password')}}" required>
                                    <div class="invalid-feedback">
                                        من فضلك أدخل رقم سري صحيح
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <input type="password" class="form-control" id="password_input22" name="password_confirmation" placeholder="{{trans('local.confirm_password')}}" required>
                                    <div class="invalid-feedback">
                                        من فضلك أدخل رقم سري صحيح
                                    </div>
                                </div>


                                <div class="form-group submit-form-group col-12">
                                    <button type="submit" class="green_btn custom_btn">{{trans('local.register')}}</button>
                                </div>

                                <div class="form-group social-login col-12">
                                    <h3 class="sign-note">{{trans('local.register_with')}}</h3>
                                    <a href="{{url('/login/facebook')}}" class="fc-icon"><i class="fa fa-facebook"></i></a>
                                    <a href="{{url('/login/google')}}" class="goo-icon"><i class="fa fa-google-plus"></i></a>
                                    <a href="{{url('/login/twitter')}}" class="tw-icon"><i class="fa fa-twitter"></i></a>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end register-model -->


    <!--start register-model -->
    <div class="modal fade" id="search-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal">&times;</button>


                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-form">
                        <h4 class="modal-title">بحث</h4>
                        <div class="inner-modal">
                            <div class="form-logo"><img src="images/main/logo.png" alt="logo" /></div>
                            <form class="needs-validation  search-form" novalidate>
                                <div class="form-group col-12">
                                    <input type="text" class="form-control" id="search_input" placeholder="بحث.." required>
                                    <div class="invalid-feedback">
                                        من فضلك أدخل اسم صحيح
                                    </div>
                                </div>

                                <button type="submit" class="search-btn custom_btn">بـحـث</button>


                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- end register-model -->



</div>
<!--end login-popup-->
@endif



<!--start header
         ================-->
<header>
    <!--start top-pg-->
    <div class="top-pg">
        <div class="container">
            <div class="row">
                <!--start top-text-->
                <div class="top-text-grid wow fadeIn col-lg-8 col-md-6 ">
                    <div class="top-text">
                        خبرة متميزة في تسويق المدخلات الزراعية
                    </div>
                </div>
                <!--end top-text-->

                <!--start login-div-->
                <div class="top-div-grid wow fadeIn col-lg-4 col-md-6 ">
                    @if(!Auth::User())


                    <div class="login-div">
                        <div class="login-head"><i class="fa fa-user"></i> {{trans('local.login')}}</div>
                        <ul class="list-unstyled animation_menu">
                            <li>
                                <span data-toggle="modal" data-target="#login-modal"><i class="fa fa-user-o main-login-icon"></i>{{trans('local.login_nn')}} </span>
                            </li>
                            <li><span data-toggle="modal" data-target="#register-modal"><i class="fa fa-unlock main-login-icon"></i> {{trans('local.register_n')}}</span></li>
                        </ul>
                    </div>
                        @else

                    <!--start caret-div-->
                        <div class="caret-div wow fadeIn">
                            <div class="crt-icon"><i class="fa fa-shopping-cart"> </i> سلة المشتريات<span class="cart-num">55</span></div>
                            <div class="caret-list">
                                <div class="caret-item">
                                    <a href="product-details.html">
                                        <img src="images/products/4.png" alt="product">
                                        <div class="side-cart">
                                            <span class="cart-pro"> بذور الكتان الذهبية</span>
                                            <span class="quantity">1 * 750 ريال</span>
                                        </div>
                                    </a>
                                    <i class="fa fa-times remove-icon"></i>
                                </div>

                                <div class="caret-item">
                                    <a href="product-details.html">
                                        <img src="images/products/5.png" alt="product">
                                        <div class="side-cart">
                                            <span class="cart-pro"> بذور الكتان الذهبية</span>
                                            <span class="quantity">1 * 750 ريال</span>
                                        </div>
                                    </a>
                                    <i class="fa fa-times remove-icon"></i>
                                </div>
                                <div class="total">الإجمالي : 576 ريال</div>
                                <a href="material-request.html" class="custom_btn dark_btn">طلب المنتجات</a>


                            </div>
                        </div>
                        <!--end caret-div-->
                        @if(Auth::User()->hasRole('employee') || Auth::User()->hasRole('suppliers'))
                        <a href="{{route('website.documentaion_center')}}" class="document-link"><i
                                    class="fa fa-users"></i>{{trans('local.staff_portal')}}</a>
                        @endif
                            <div class="login-div">
                                <div class="login-head"><i class="fa fa-user"></i> {{Auth::User()->username}}</div>
                                <ul class="list-unstyled animation_menu">
                                    @if(Auth::User()->hasRole('admin'))
                                    <li>
                                        <a href="{{route('dashboard')}}" style="color:white;"><i
                                                    class="fa fa-user-o main-login-icon"></i>{{trans('local.dashboard')}}
                                        </a>
                                    </li>
@endif
                                    <li>
                                        <a ><i class="fa fa-user-o main-login-icon"></i>{{trans('local.profile')}} </a>
                                    </li>

                                    <li>
                                        <a ><i class="fa fa-edit"></i>{{trans('local.edit_profile')}} </a>
                                    </li>
                                    <li>
                                        <a href="/logout" style="color: white;"><i class="fa fa-power-off main-login-icon"></i> {{trans('local.logout')}} </a>
                                    </li>
                                </ul>
                            </div>

                        @endif
                </div>
                <!--end login-div-->


            </div>
        </div>


    </div>
    <!--end top-pg -->

    <!--start main-header-->
    <div class="main-header">
        <div class="main-header-content">
            <div class="container">
                <div class="row">

                    <!--start logo-->
                    <div class="logo-grid wow fadeIn col-xl-2 col-lg-2  col-sm-5 col-6">
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{asset('images/main/logo.png')}}" alt="logo"/>
                        </a>
                    </div>
                    <!--end logo-->

                    <!--start nav-->

                    <nav class="nav-grid  col-xl-8 col-lg-9 col-md-12">
                        <div class="responsive-logo-grid">
                            <a href="index.html" class="logo">
                                <img src="images/main/logo.png" alt="logo" />
                            </a>
                        </div>
                        <div class="nav-content">
                            <ul class="list-inline main-menu wow fadeIn">
                                <li><a href="news.html">الأخبار</a></li>
                                <li><a href="services.html">الخدمات</a></li>

                                <li>
                                    <a href="gallery.html">
                                        الصور والفيديوهات
                                    </a>
                                </li>

                                <li class="list-item-has-child">
                                    <a href="{{route('website.product')}}">
                                        {{trans('local.products')}}
                                    </a>
                                    <div class="dropmenu-list">
                                        <div class="divided-dropmenu">
                                            @foreach($products as $product)
                                                @if(session()->get('lang')=='en')
                                                    <a href="{{route('website.detail_product',$product->en_name)}}"><img
                                                                src="{{asset('uploads/'.$product->image)}}"
                                                                alt="">{{$product->en_name}}</a>
                                                @else
                                                    <a href="{{route('website.detail_product',$product->name)}}"><img
                                                                src="{{asset('uploads/'.$product->image)}}"
                                                                alt="">{{$product->name}}</a>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="dropmenu-more">
                                            <a href="{{route('website.product')}}"
                                               class="custom_btn green_btn">{{trans('local.show_all')}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item-has-child">
                                    <a href="branches.html"> فروع الشركة </a>

                                    <div class="dropmenu-list">
                                        <div class="divided-dropmenu">
                                            <a href="branch-details.html"><img src="images/main/branches.png" alt="img">اسم الفرع</a>
                                            <a href="branch-details.html"><img src="images/main/branches.png" alt="img">اسم الفرع</a>
                                            <a href="branch-details.html"><img src="images/main/branches.png" alt="img">اسم الفرع</a>
                                            <a href="branch-details.html"><img src="images/main/branches.png" alt="img">اسم الفرع</a>
                                        </div>

                                        <div class="dropmenu-more">
                                            <a href="branches.html" class="custom_btn green_btn">عرض الكل</a>
                                        </div>
                                    </div>
                                </li>

                                <li><a href="suppliers.html">الموردون</a></li>
                                <li><a href="jobs.html">التوظيف</a></li>
                                <li><a href="about.html">من نحن</a></li>

                                <li><a href="{{route('website.contact')}}">{{trans('local.contact_us')}}</a></li>


                            </ul>
                        </div>
                    </nav>
                    <!--end nav-->


                    <!--start lang+social-->
                    <div class="lan-soc-grid col-xl-2  col-lg-1  col-sm-7 col-6">




                        <!--start language-->
                        <div class="lang-div wow fadeIn">
                            @if(session()->get('lang')=='en')
                                <a href="/lang/ar">عربي<i class="fa fa-globe"></i></a>

                                @else
                                <a href="/lang/en">En<i class="fa fa-globe"></i></a>


                            @endif
                        </div>
                        <!--end language-->


                        <!--start search-->
                        <div class="search wow fadeIn">
                            <div data-toggle="modal" data-target="#search-modal"><i class="fa fa-search"></i></div>
                        </div>
                        <!--end search-->
                        <div class="nav-icon"><span></span><span></span> <span></span></div>

                    </div>
                    <!--end lang+social-->



                </div>
            </div>
        </div>
    </div>


    @if (isset($errors))
        <div id="sweet_warning" style="display: none" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif

    @include('website.layouts.message')

</header>

<!--start model -->
<div class="modal fade" id="success-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal">&times;</button>


            <!-- Modal body -->
            <div class="modal-body">
                <div class="remove-form">
                    <div class="inner-modal">
                        <form class="needs-validation row" novalidate>
                            <h3 class="col-12">
                                {{trans('local.success_message')}}
                            </h3>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- end model -->
<!--start model -->

<div class="modal fade" id="malinglist_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal">&times;</button>


            <!-- Modal body -->
            <div class="modal-body">
                <div class="remove-form">
                    <div class="inner-modal">
                        <form class="needs-validation row" novalidate>
                            <h3 class="col-12">
                                {{trans('local.message_mailinglist')}}
                            </h3>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- end model -->

<!--end header-->
@yield('content')

<!--start footer
             ================-->

<footer>
    <div class="container">
        <div class="row">
            <!--start contact-info-->
            <div class="col-lg-4 col-md-6 contact-information-grid">
                <div class="contact-information wow fadeIn">
                    <h3 class="white-title">تواصل معانا</h3>
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
            <!--end contact-info-->

            <!--start footer-form-->
            <div class="col-lg-4 col-md-6 footer-form wow fadeIn">
                <h3 class="white-title">{{trans('local.mailing_list')}} </h3>
                <form class="needs-validation search-form2 maling_list" onsubmit="return false;" novalidate>
                    <div class="form-group">
                        <input type="text" class="form-control" id="search_input2" placeholder="{{trans('local.input_email')}} " required>
                        <div class="invalid-feedback">
                            من فضلك أدخل اسم صحيح
                        </div>
                        <button type="submit" class="search-btn2"><i class="fa fa-paper-plane"></i></button>

                    </div>
                </form>
                <div class="social-icons-list">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-snapchat"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--end footer-form-->

            <!--start footer-map-->
            <div class="col-lg-4 col-md-12 footer-map wow fadeIn">
                <div class="map wow fadeIn">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=%D8%A7%D9%84%D8%A7%D8%AD%D8%B3%D8%A7%D8%A1-%D8%A7%D9%84%D9%87%D9%81%D9%88%D9%81-%D8%B4%D8%A7%D8%B1%D8%B9%20%D8%A7%D9%84%D9%85%D9%84%D9%83%20%D8%B9%D8%A8%D8%AF%20%D8%A7%D9%84%D8%B9%D8%B2%D9%8A%D8%B2&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            Google Maps by <a href="https://www.embedgooglemap.net" rel="nofollow" target="_blank"></a></div>
                    </div>
                </div>
            </div>
            <!--end footer-map-->

        </div>
    </div>
</footer>
<!--end footer-->




<!--start copyrights
         ================-->
<div class="copyrights">
    <div class="container">
        <div class="row">
            <div class="col-9 copy-right wow fadeIn">
                جميع الحقوق محفوظة لدى الياسين © 2019
            </div>

            <div class="col-3 copy-left wow fadeIn">
                <a href="https://jaadara.com/"> <img src="images/main/gdara.png" alt="img"> </a>
            </div>
        </div>
    </div>
</div>
<!--end copyrights-->

@include('website.layouts.footer')
</body>

</html>