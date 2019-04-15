@extends('website.layouts.layout')
@section('content')
    <!--start pages-header
             ================-->

    <section class="pages-header text-center about-header">
        <div class="container">
            <div class="row">
                <h3 class="dark-title center-border-title border-title col-12 wow fadeIn">{{trans('local.about')}}</h3>
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
                        {{session()->get('lang')=='en'?$about->en_descr:$about->descr}}

                    </p>
                    @foreach($three_staticpages as $three_staticpage)
                    <p>
                        <span class="arrow-title green_title"> {{session()->get('lang')=='en'?$three_staticpage->en_title:$three_staticpage->title}}</span>
                        {{session()->get('lang')=='en'?$three_staticpage->en_descr:$three_staticpage->descr}}
                    </p>
                    @endforeach
                </div>
                <!--end about-descripe-->


                <!--start news-->
                <div class="col-lg-6 col-md-12 news">
                    <div class="small-gallery">
                    @foreach($staticpage_images as $staticpage_image)
                        <!--start snake-->
                        <div class="main snake wow fadeIn">
                            <a href="{{asset('uploads/'.$staticpage_image->image)}}" class="html5lightbox"
                               data-group="set-3">
                                <div class="overlay"><span
                                            class="title">{{(session()->get('lang')=='en'?$staticpage_image->en_title:$staticpage_image->title)}}</span>
                                </div>
                                <div class="sm-galler-img full-width-img">
                                    <img src="{{asset('uploads/'.$staticpage_image->image)}}" alt="img"
                                         class="converted-img"/>
                                </div>
                            </a>
                        </div>
                        <!--end snake-->
                        @endforeach

                    </div>
                </div>
                <!--end news-->
            </div>
        </div>
    </section>

    <!--end about-pg-->

    <!--start about-pg2
         ================-->

    <section class="about-pg2 margin-div gray-bg">
        <div class="container">
            <div class="row">

                <!--start about-descripe-->
                <div class="col-12 about-descripe res-marg wow fadeIn">
                    <p>
                        @foreach($staticpages as $staticpage)
                            <span class="arrow-title green_title  wow fadeIn"> {{session()->get('lang')=='en'?$staticpage->en_title:$staticpage->title}}</span>
                            {{session()->get('lang')=='en'?$staticpage->en_descr:$staticpage->descr}}

                        @endforeach
                    </p>

                </div>
                <!--end about-descripe-->

                <!--start certificates-->
                <div class="col-12  about-descripe res-marg wow fadeIn">
                    <span class="arrow-title green_title wow fadeIn"> {{trans('local.prize_certificatescompany')}} </span>
                    <div class="row certificates">

                    @foreach($certificates as $certificate)
                        <!--start certificate-->
                            <div class="col-lg-3 col-6 wow fadeIn">
                                <a href="{{asset('uploads/'.$certificate->image)}}" class="html5lightbox"
                                   data-group="set-4">
                                    <div class="certificate-img full-width-img">
                                        <img src="{{asset('uploads/'.$certificate->image)}}" alt="img"
                                             class="converted-img"/>
                                    </div>
                                </a>
                            </div>
                            <!--end certificate-->
                        @endforeach


                    </div>
                    <span class="arrow-title green_title"> {{trans('local.board_members')}}</span>
                    <div class="workers">
                        <!--start third-owl-->
                        <div id="owl-demo" class="owl-carousel owl-theme third-owl">
                        @foreach($members as $member)
                            <!-- start owl-item -->
                                <div class="item">
                                    <div class="worker">
                                        <div class="worker-img-container">
                                            <a href="{{asset('uploads/'.$member->getEmployee->image)}}"
                                               class="html5lightbox" data-group="set-5">
                                                <div class="worker-img full-width-img">
                                                    <img src="{{asset('uploads/'.$member->getEmployee->image)}}"
                                                         alt="img" class="converted-img"/>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="img-effect full-width-img">
                                            <img src="{{asset('uploads/'.$member->getEmployee->image)}}" alt="img"
                                                 class="converted-img"/>

                                        </div>


                                        <ul class="list-unstyled worker-list">
                                            <li><i class="fa fa-user"></i> {{$member->getEmployee->getUser->username}}
                                            </li>
                                            <li>
                                                <i class="fa fa-credit-card"></i>{{session()->get('lang')=='en'?$member->en_title:$member->title}}
                                            </li>
                                            <li>{{session()->get('lang')=='en'?$member->en_descr:$member->descr}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end owl-item -->
                            @endforeach


                        </div>
                    </div>
                    <!--end third-owl-->

                </div>
            </div>
            <!--end certificates-->

        </div>
        </div>
    </section>

    <!--end about-pg2-->
@endsection