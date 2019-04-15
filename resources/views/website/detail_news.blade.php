@extends('website.layouts.layout')

@section('content')
    <!--start pages-header
             ================-->

    <section class="pages-header text-center news-header">
        <div class="container">
            <div class="row">
                <h3 class="dark-title center-border-title border-title col-12 wow fadeIn"> {{trans('local.news')}}</h3>
            </div>
        </div>
    </section>
    <!--end pages-header-->



    <!--start news-pg
          ================-->

    <section class="news-pg news margin-div gray-bg">
        <div class="container">
            <div class="row">
                <div class="years col-lg-3 col-md-2 res-marg">
                @foreach ($years as $year)

                    <!--start years-div-->
                        <div class="year-div">
                            <span class="year-name">{{$year}} <b>({{count($years)}})</b></span>
                            <ul class="list-unstyled months-list">
                                <li>

                                    <span class="month-name">{{trans('local.january')}}</span>
                                    <ul class="list-unstyled year-news-list">
                                        @foreach(\App\Models\News::whereMonth('created_at', '=', date(1))->whereYear('created_at', '=', date($year))->orderby('created_at','DESC')->get() as$new_jan)
                                            <li>
                                                <a href="{{route('website.detail_news',$new_jan->title)}}">{{session()->get('lang')=='en'?$new_jan->en_title:$new_jan->title}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>

                                <li>
                                    <span class="month-name">{{trans('local.february')}}</span>
                                    <ul class="list-unstyled year-news-list">
                                        @foreach(\App\Models\News::whereMonth('created_at', '=', date(2))->where('last_news',1)->whereYear('created_at', '=', date($year))->orderby('created_at','DESC')->get() as$new_feb)
                                            <li>
                                                <a href="{{route('website.detail_news',$new_feb->title)}}">{{session()->get('lang')=='en'?$new_feb->en_title:$new_feb->title}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>

                                <li>
                                    <span class="month-name">{{trans('local.march')}}</span>
                                    <ul class="list-unstyled year-news-list">
                                        @foreach(\App\Models\News::where('last_news',1)->whereMonth('created_at', '=', date(3))->whereYear('created_at', '=', date($year))->orderby('created_at','DESC')->get() as$new_mar)
                                            <li>
                                                <a href="{{route('website.detail_news',$new_mar->title)}}">{{session()->get('lang')=='en'?$new_mar->en_title:$new_mar->title}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>

                                <li>
                                    <span class="month-name">{{trans('local.april')}}</span>
                                    <ul class="list-unstyled year-news-list">
                                        @foreach(\App\Models\News::whereMonth('created_at', '=', date(4))->whereYear('created_at', '=', date($year))->where('last_news',1)->orderby('created_at','DESC')->get() as$new_april)
                                            <li>
                                                <a href="{{route('website.detail_news',$new_april->title)}}">{{session()->get('lang')=='en'?$new_april->en_title:$new_april->title}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>


                            </ul>
                        </div>
                        <!--end years-div-->
                    @endforeach

                    {{--<!--start years-div-->--}}
                    {{--<div class="year-div">--}}
                    {{--<span class="year-name">2018 <b>(3)</b></span>--}}
                    {{--<ul class="list-unstyled months-list">--}}
                    {{--<li>--}}
                    {{--<span class="month-name">يناير</span>--}}
                    {{--<ul class="list-unstyled year-news-list">--}}
                    {{--<li><a href="news-details.html">خبر 1</a></li>--}}
                    {{--<li><a href="news-details.html">خبر 2</a></li>--}}

                    {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                    {{--<span class="month-name">فبراير</span>--}}
                    {{--<ul class="list-unstyled year-news-list">--}}
                    {{--<li><a href="news-details.html">خبر 1</a></li>--}}
                    {{--<li><a href="news-details.html">خبر 2</a></li>--}}

                    {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                    {{--<span class="month-name">مارس</span>--}}
                    {{--<ul class="list-unstyled year-news-list">--}}
                    {{--<li><a href="news-details.html">خبر 1</a></li>--}}
                    {{--<li><a href="news-details.html">خبر 2</a></li>--}}

                    {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                    {{--<span class="month-name">أبريل</span>--}}
                    {{--<ul class="list-unstyled year-news-list">--}}
                    {{--<li><a href="news-details.html">خبر 1</a></li>--}}
                    {{--<li><a href="news-details.html">خبر 2</a></li>--}}

                    {{--</ul>--}}
                    {{--</li>--}}


                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<!--end years-div-->--}}



                    {{--<!--start years-div-->--}}
                    {{--<div class="year-div">--}}
                    {{--<span class="year-name">2017 <b>(3)</b></span>--}}
                    {{--<ul class="list-unstyled months-list">--}}
                    {{--<li>--}}
                    {{--<span class="month-name">يناير</span>--}}
                    {{--<ul class="list-unstyled year-news-list">--}}
                    {{--<li><a href="news-details.html">خبر 1</a></li>--}}
                    {{--<li><a href="news-details.html">خبر 2</a></li>--}}

                    {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                    {{--<span class="month-name">فبراير</span>--}}
                    {{--<ul class="list-unstyled year-news-list">--}}
                    {{--<li><a href="news-details.html">خبر 1</a></li>--}}
                    {{--<li><a href="news-details.html">خبر 2</a></li>--}}

                    {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                    {{--<span class="month-name">مارس</span>--}}
                    {{--<ul class="list-unstyled year-news-list">--}}
                    {{--<li><a href="news-details.html">خبر 1</a></li>--}}
                    {{--<li><a href="news-details.html">خبر 2</a></li>--}}

                    {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                    {{--<span class="month-name">أبريل</span>--}}
                    {{--<ul class="list-unstyled year-news-list">--}}
                    {{--<li><a href="news-details.html">خبر 1</a></li>--}}
                    {{--<li><a href="news-details.html">خبر 2</a></li>--}}

                    {{--</ul>--}}
                    {{--</li>--}}


                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<!--end years-div-->--}}


                </div>
                <div class="col-lg-9 col-md-10">
                    <div class="news-search col-lg-8">
                        <form class="needs-validation search-form3 form-inline" novalidate>
                            <div class="form-group">
                                <label> بــحــــــث :</label>
                                <input type="text" class="form-control" id="search_input3" required>
                                <div class="invalid-feedback">
                                    من فضلك أدخل اسم صحيح
                                </div>
                                <button type="submit" class="search-btn2"><i class="fa fa-search"></i></button>

                            </div>
                        </form>
                    </div>
                    <div class="news-filter">
                        <form class="needs-validation form-inline" novalidate>
                            <div class="check-boxes-group row col-12">
                                <div class="custom-control custom-checkbox mb-3 col-xl-3 col-lg-4 col-sm-4">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation1">
                                    <label class="custom-control-label" for="customControlValidation1">بحث
                                        بالعنوان</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3  col-xl-3 col-lg-4 col-sm-4">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation12">
                                    <label class="custom-control-label" for="customControlValidation12">بحث
                                        بالمحتوى</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3  col-xl-3 col-lg-4 col-sm-4">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation13">
                                    <label class="custom-control-label" for="customControlValidation13">بحث
                                        بالتاريخ</label>
                                    <div class="form-group form-group-pos">
                                        <input type="text" class="form-control" id="datepicker" placeholder="من"
                                               required>
                                        <input type="text" class="form-control" id="datepicker2" placeholder="إلي"
                                               required>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>


                    @if(isset($news))
                        <div class="main-news-details row col-lg-12">

                            <div class="col-lg-6  main-news-div">
                                <h3 class="news-title dark-title">{{session()->get('lang')=='en'?$news->en_title:$news->title}}</h3>
                                <span class="news-date"><i
                                            class="fa fa-calendar"></i>{{$news->created_at->formatLocalized('%d %B %Y')}}</span>
                                <p class="dark-prg">
                                    {{session()->get('lang')=='en'?$news->en_descr:$news->descr}}
                                </p>
                                <div class="social-icons-pro news-social news-details-soc">
                                    <span class="share-text">{{trans('local.share_by')}}</span>
                                    <ul class="list-inline">
                                        <li class="tw-soc"><a
                                                    href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('website.detail_news',$news->title)}}"><i
                                                        class="fa fa-twitter"></i></a></li>
                                        <li class="goo-soc"><a
                                                    href="https://plus.google.com/share?url={{route('website.detail_news',$news->title)}}"><i
                                                        class="fa fa-google-plus"></i></a></li>
                                        <li class="fc-soc"><a
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{route('website.detail_news',$news->title)}}"><i
                                                        class="fa fa-facebook"></i></a></li>
                                        <li class="whats-soc"><a
                                                    href="https://wa.me/?text={{route('website.detail_news',$news->title)}}"><i
                                                        class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <div class="slider location-slider news-carousel">
                                    <div id="owl-demo" class="owl-carousel owl-theme first-owl">
                                        <!-- start owl-item -->
                                        <div class="item">
                                            <div class="slider-img full-width-img">
                                                <img src="{{asset('uploads/'.$news->image)}}" alt="img"
                                                     class="converted-img"/>
                                            </div>
                                            <div class="news-caption-slider">
                                                <h3>{{session()->get('lang')=='en'?$news->titleen_image:$news->title_image}}</h3>
                                            </div>
                                        </div>
                                        <!-- end owl-item -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                    @if(isset($search_news))
                        <div class="main-news-details row col-lg-12">

                            <div class="col-lg-6  main-news-div">
                                <h3 class="news-title dark-title">{{session()->get('lang')=='en'?$search_news->en_title:$search_news->title}}</h3>
                                <span class="news-date"><i
                                            class="fa fa-calendar"></i>{{$search_news->created_at->formatLocalized('%d %B %Y')}}</span>
                                <p class="dark-prg">
                                    {{session()->get('lang')=='en'?$search_news->en_descr:$search_news->descr}}
                                </p>
                                <div class="social-icons-pro news-social news-details-soc">
                                    <span class="share-text">{{trans('local.share_by')}}</span>
                                    <ul class="list-inline">
                                        <li class="tw-soc"><a
                                                    href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('website.detail_news',$search_news->title)}}"><i
                                                        class="fa fa-twitter"></i></a></li>
                                        <li class="goo-soc"><a
                                                    href="https://plus.google.com/share?url={{route('website.detail_news',$search_news->title)}}"><i
                                                        class="fa fa-google-plus"></i></a></li>
                                        <li class="fc-soc"><a
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{route('website.detail_news',$search_news->title)}}"><i
                                                        class="fa fa-facebook"></i></a></li>
                                        <li class="whats-soc"><a
                                                    href="https://wa.me/?text={{route('website.detail_news',$search_news->title)}}"><i
                                                        class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <div class="slider location-slider news-carousel">
                                    <div id="owl-demo" class="owl-carousel owl-theme first-owl">
                                        <!-- start owl-item -->
                                        <div class="item">
                                            <div class="slider-img full-width-img">
                                                <img src="{{asset('uploads/'.$search_news->image)}}" alt="img"
                                                     class="converted-img"/>
                                            </div>
                                            <div class="news-caption-slider">
                                                <h3>{{session()->get('lang')=='en'?$search_news->titleen_image:$search_news->title_image}}</h3>
                                            </div>
                                        </div>
                                        <!-- end owl-item -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    @else
                        <h1>{{trans('local.no_resultsearch')}}</h1>
                    @endif
                    <div class="news-inner-page">
                        <h3 class="news-title dark-title marg-bt">{{trans('local.related_links')}} </h3>
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


                    </div>
                </div>
            </div>
    </section>

    <!--end news-pg-->
@endsection