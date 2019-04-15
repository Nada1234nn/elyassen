@extends('website.layouts.layout')
@section('content')
    <!--start pages-header
             ================-->

    <section class="pages-header text-center about-header">
        <div class="container">
            <div class="row">
                <h3 class="dark-title center-border-title border-title col-12 wow fadeIn">من نحن</h3>
            </div>
        </div>
    </section>
    <!--end pages-header-->

    <!--start about-pg
          ================-->

    <section class="about-pg margin-div">
        <div class="container">
            <div class="row">

                <!--start about-descripe-->
                <div class="col-lg-6 col-md-12 about-descripe res-marg wow fadeIn">
                    <p>
                        تأسست شركتنا عام 1980 في فرع واحد فى االأحساء حتي تتطورت اعمالها و وصلت الى اثنا عشر فرع منتشرة
                        على مستوى السوق الزراعي فى المملكة
                        <span class="arrow-title green_title"> نشاطنا</span>
                        نقدم توليفة من أفضل مواد التوليفة الزراعية مثل البذور المتميزة و الأسمدة المتخصصة و الكيماويات
                        الزراعية الفعالة لمزراعي الخضروات بشكل خاص و المزارعين فى المملكة
                        <span class="arrow-title green_title"> مدى عملنا</span>
                        شركة رائدة فى السوق السعودي بتخصصها فى خدمة مزراعى الخضروات
                    </p>

                </div>
                <!--end about-descripe-->


                <!--start news-->
                <div class="col-lg-6 col-md-12 news">
                    <div class="small-gallery">
                        <!--start snake-->
                        <div class="main snake wow fadeIn">
                            <a href="images/pages/1.png" class="html5lightbox" data-group="set-3">
                                <div class="overlay"><span class="title">اسم الصورة</span></div>
                                <div class="sm-galler-img full-width-img">
                                    <img src="images/pages/1.png" alt="img" class="converted-img"/>
                                </div>
                            </a>
                        </div>
                        <!--end snake-->

                        <!--start snake-->
                        <div class="main snake wow fadeIn">
                            <a href="images/pages/2.png" class="html5lightbox" data-group="set-3">
                                <div class="overlay"><span class="title">نص تجريبي</span></div>
                                <div class="sm-galler-img full-width-img">
                                    <img src="images/pages/2.png" alt="img" class="converted-img"/>
                                </div>
                            </a>
                        </div>
                        <!--end snake-->


                        <!--start snake-->
                        <div class="main snake wow fadeIn">
                            <a href="images/pages/3.png" class="html5lightbox" data-group="set-3">
                                <div class="overlay"><span class="title">عنوان الصورة</span></div>
                                <div class="sm-galler-img full-width-img">
                                    <img src="images/pages/3.png" alt="img" class="converted-img"/>
                                </div>
                            </a>
                        </div>
                        <!--end snake-->

                        <!--start snake-->
                        <div class="main snake wow fadeIn">
                            <a href="images/pages/4.png" class="html5lightbox" data-group="set-3">
                                <div class="overlay"><span class="title">عنوان تجريبي</span></div>
                                <div class="sm-galler-img full-width-img">
                                    <img src="images/pages/4.png" alt="img" class="converted-img"/>
                                </div>
                            </a>
                        </div>
                        <!--end snake-->

                    </div>
                </div>
                <!--end news-->
            </div>
        </div>
    </section>

    <!--end about-pg-->
@endsection