@extends('website.layouts.layout')

@section('content')
<!--start slider
            ================-->

<section class="slider">
    <div class="container-fluid">
        <div class="row">
            <div id="owl-demo" class="owl-carousel owl-theme first-owl">
            @if(count($sliders_news) > 0)
                @foreach($sliders_news as $slider_news)
                <!-- start owl-item -->
                <div class="item">
                    <div class="slider-img full-width-img">
                        <img src="{{asset('uploads/'.$slider_news->image)}}" alt="img" class="converted-img"/>
                    </div>
                    <div class="slider-caption">
                        <div class="container">
                            <h3 class="dark-title border-title">{{session()->get('lang')=='en'?$slider_news->en_title:$slider_news->title}}</h3>
                            <p class="dark-prg">{{session()->get('lang')=='en'?$slider_news->en_descr:$slider_news->descr}}</p>
                            <a href="{{route('website.detail_news',$slider_news->title)}}"
                               class="custom_btn green_btn">{{trans('local.read_more')}}</a>
                        </div>
                    </div>
                </div>
                <!-- end owl-item -->
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</section>
<!--end slider-->

<!--start products
      ================-->

<section class="products margin-div">
    <div class="container">
        <div class="row">

            <!--start side-tabs-->
            <div class="col-lg-3 col-md-5 side-tabs-grid res-marg">
                <div class="side-tabs wow fadeIn">
                    <h2 class="tab-title dark-title"><i class="fa fa-pagelines"></i> {{trans('local.our_pro')}} </h2>
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{route('website.search_pro',$category->name)}}"><img
                                        src="{{asset('uploads/'.$category->icon_cat)}}" alt="icon"/>
                                {{session()->get('lang')=='en'?$category->en_name:$category->name}}</a>
                        </li>

                        @endforeach
                    </ul>

                </div>

            </div>
            <!--end side-tabs-->


            <!--start news-->
            <div class="col-lg-9 col-md-7 news">
                <div class="new-content">
                    <h2 class="sec-title green_title"><i class="fa fa-users"></i> {{trans('local.lastest_news')}}</h2>
                    <div class="scrollbar news-scroll">
                    @foreach($lastest_news as $last_news)
                        <!--start news-div-->
                        <div class="news-div">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3 class="news-title dark-title">{{session()->get('lang')=='en'?$last_news->en_title:$last_news->title}}</h3>
                                    <span class="news-date"><i
                                                class="fa fa-calendar"></i>{{$last_news->created_at->formatLocalized('%d %B %Y')}}

                                    </span>

                                    <p class="dark-prg"> {{session()->get('lang')=='en'?$last_news->en_descr:$last_news->descr}}</p>
                                    <a href="{{route('website.detail_news',$last_news->title)}}"
                                       class="more_btn">{{trans('local.read_more')}}<i class="fa fa-plus"></i></a>
                                </div>

                                <div class="col-md-5">

                                    <div class="news-img-grid">
                                        <a href="{{asset('uploads/'.$last_news->image)}}" class="html5lightbox"
                                           data-group="set-1">
                                            <div class="news-img full-width-img">
                                                <img src="{{asset('uploads/'.$last_news->image)}}" alt="img"
                                                     class="converted-img"/>
                                            </div>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--end news-div-->
                        @endforeach


                        <div class="text-center"><a href="{{route('website.news')}}"
                                                    class="custom_btn green_btn">{{trans('local.more_news')}}</a></div>
                    </div>
                </div>
            </div>
            <!--end news-->
        </div>
    </div>
</section>

<!--end products-->


<!--start public-opinions
      ================-->

<section class="public-opinions margin-div">
    <div class="container">
        <div class="row">

            <!--start side-tabs-->
            <div class="col-lg-3 col-md-5 side-tabs-grid res-marg wow fadeIn">
                <div class="side-tabs wow fadeIn">
                    <h2 class="tab-title dark-title"><i class="fa fa-user"></i> أراء العملاء </h2>

                    <div id="owl-demo" class="owl-carousel owl-theme secondary-owl text-center">
                        <!-- start owl-item -->
                        <div class="item">
                            <p class="dark-prg">
                                تجربة رائعة جدا ننصحكم بالتعامل مع منتجات و كيماويات شركة الياسمين
                            </p>
                            <h4 class="green_title">أحمد المرى </h4>
                            <span class="opn-job"> مدير مزرعة</span>
                        </div>
                        <div class="item">
                            <p class="dark-prg">
                                تجربة رائعة جدا ننصحكم بالتعامل مع منتجات و كيماويات شركة الياسمين
                            </p>
                            <h4 class="green_title">أحمد المرى </h4>
                            <span class="opn-job"> مدير مزرعة</span>
                        </div>

                        <div class="item">
                            <p class="dark-prg">
                                تجربة رائعة جدا ننصحكم بالتعامل مع منتجات و كيماويات شركة الياسمين
                            </p>
                            <h4 class="green_title">أحمد المرى </h4>
                            <span class="opn-job"> مدير مزرعة</span>
                        </div>
                        <!-- end owl-item -->
                    </div>
                </div>
            </div>
            <!--end side-tabs-->


            <!--start twitter-div-->
            <div class="col-lg-9 col-md-7 news">
                <div class="new-content twiter-content wow fadeIn">
                    <h2 class="sec-title green_title"><span class="twitter-bird-animation"></span>أخرالتغريدات</h2>
                    <div class="scrollbar">
                        <!--start twi-div-->
                        <div class="twi-div">
                            <a href="images/main/man.png" class="html5lightbox" data-group="set-2">
                                <div class="tw-img full-width-img">
                                    <img src="images/main/man.png" alt="img" class="converted-img" />
                                </div>
                            </a>
                            <div class="side-tw">
                                <a href="#" class="dark-title tw-name">أحمد الهاجري </a>
                                <a href="#" class="dark-title tw-hash"> الهاجري1991@</a>
                            </div>
                            <p class="dark-prg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص</p>
                            <span class="tw-date">قبل دقائق</span>
                        </div>

                        <!--end twi-div-->
                        <!--start twi-div-->
                        <div class="twi-div">
                            <a href="images/main/man.png" class="html5lightbox" data-group="set-2">
                                <div class="tw-img full-width-img">
                                    <img src="images/main/man.png" alt="img" class="converted-img" />
                                </div>
                            </a>
                            <div class="side-tw">
                                <a href="#" class="dark-title tw-name">أحمد الهاجري </a>
                                <a href="#" class="dark-title tw-hash"> الهاجري1991@</a>
                            </div>
                            <p class="dark-prg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص</p>
                            <span class="tw-date">قبل دقائق</span>
                        </div>

                        <!--end twi-div-->

                        <!--start twi-div-->
                        <div class="twi-div">
                            <a href="images/main/man.png" class="html5lightbox" data-group="set-2">
                                <div class="tw-img full-width-img">
                                    <img src="images/main/man.png" alt="img" class="converted-img" />
                                </div>
                            </a>
                            <div class="side-tw">
                                <a href="#" class="dark-title tw-name">أحمد الهاجري </a>
                                <a href="#" class="dark-title tw-hash"> الهاجري1991@</a>
                            </div>
                            <p class="dark-prg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص</p>
                            <span class="tw-date">قبل دقائق</span>
                        </div>

                        <!--end twi-div-->

                    </div>
                </div>
            </div>
            <!--end twitter-div-->
        </div>
    </div>
</section>

<!--end products-->
    @endsection