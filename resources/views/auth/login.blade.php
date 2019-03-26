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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!--
      Style sheet
      ================
    -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css" />
    <!--for arabic only-->
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}" type="text/css" />
    <!--end-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" type="text/css" />
    <link href="{{asset('css/jPages.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/intlTelInput.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/keyframes.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    @if(session()->get('lang')=='en')

        <link rel="stylesheet" href="{{asset('css/en.css')}}" type="text/css" />
    @else
    <!--arabic-style only-->
        <link rel="stylesheet" href="{{asset('css/ar.css')}}" type="text/css" />
    @endif
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css" />

</head>

<body>







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


                    <!--start language-->
                    <div class="lang-div wow fadeIn">
                        @if(session()->get('lang')=='en')
                            <a href="/lang/ar" style="color: white;">عربي<i class="fa fa-globe"></i></a>

                        @else
                            <a href="/lang/en" style="color: white;">En<i class="fa fa-globe"></i></a>


                        @endif
                    </div>
                    <!--end language-->

                </div>
                <!--end login-div-->


            </div>
        </div>


    </div>
    <!--end top-pg -->
    <!--start logo-->
    <div class="logo-grid wow fadeIn col-xl-2 col-lg-2  col-sm-5 col-6">
        <a href="/" class="logo">
            <img src="{{asset('images/main/logo.png')}}" alt="logo" />
        </a>
    </div>
    <!--end logo-->
    @if (isset($errors))
        <div id="sweet_warning" style="display: none" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif

    @include('website.layouts.message')

</header>

<!--end header-->






<!--start pages-header
         ================-->

<section class="pages-header text-center consult-header">
    <div class="container">
        <div class="row">
            <h3 class="dark-title center-border-title border-title col-12 wow fadeIn"> {{trans('local.login_nn')}} </h3>
        </div>
    </div>
</section>
<!--end pages-header-->



<!--start about-pg
      ================-->

<section class="about-pg margin-div gray-bg pg-height">
    <div class="container">
        <div class="row">
            <!--start right-consult-->
            <div class="col-lg-6  about-descripe res-marg wow fadeIn">
                <div class="right-consult wow fadeIn">
                    <h2 class="wow fadeIn">{{trans('local.login_now')}} </h2>
                    <p class="wow fadeIn">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق</p>
                </div>
            </div>
            <!--end right-consult-->
            <!--start left-consult-->
            <div class="col-lg-6  about-descripe wow fadeIn">
                <div class="left-consult wow fadeIn">
                    <form class="needs-validation icons-form row" method="post" action="/loginAdmin" novalidate>
                        @csrf
                        <div class="form-group col-12">
                            <input type="text" class="form-control" name="email" placeholder=" {{trans('local.username')}} \ {{trans('local.email')}}" required>
                            <i class="fa fa-user main-form-icon"></i>
                            <span class="cu-lb"></span>
                            <div class="invalid-feedback">
                                من فضلك أدخل اسم صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <input type="password" class="form-control" name="password" placeholder="{{trans('local.password')}}" required>
                            <i class="fa fa-lock main-form-icon"></i>
                            <span class="cu-lb"></span>
                            <div class="invalid-feedback">
                                من فضلك أدخل كلمة سر صحيحة
                            </div>
                        </div>

                        <div class="form-group col-4 condition-form-group wow fadeIn">
                            <input type="checkbox" id="customRadioInline2" name="remember" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">{{trans('local.remember_me')}}</label>
                        </div>



                        <div class="full-width-btn  col-12">
                            <button type="submit" class="dark_btn custom_btn">{{trans('local.login')}}</button>
                        </div>


                    </form>
                </div>
            </div>
            <!--start left-consult-->

        </div>
    </div>
</section>

<!--end about-pg-->









<!--start copyrights
         ================-->
<div class="copyrights">
    <div class="container">
        <div class="row">
            <div class="col-9 copy-right wow fadeIn">
                جميع الحقوق محفوظة لدى الياسين © 2019
            </div>

            <div class="col-3 copy-left wow fadeIn">
                <a href="https://jaadara.com/"> <img src="{{asset('images/main/gdara.png')}}" alt="img"> </a>
            </div>
        </div>
    </div>
</div>
<!--end copyrights-->









<!--Scripts
     ================-->

<script type="text/javascript" src="{{asset('local.js/html5shiv.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/respond.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jPages.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/html5lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('js/snake.min.js')}}"></script>
<script src="{{asset('js/intlTelInput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/custom.js')}}" type="text/javascript"></script>




</body>

</html>
