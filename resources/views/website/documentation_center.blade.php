@extends('website.layouts.layout')

@section('content')

    <!--start pages-header
             ================-->

    <section class="pages-header text-center jobs-header">
        <div class="container">
            <div class="row">
                <h3 class="dark-title center-border-title border-title col-12 wow fadeIn">{{trans('local.staff_portal')}}</h3>
            </div>
        </div>
    </section>
    <!--end pages-header-->

    <!--start about-pg
          ================-->

    <section class="about-pg documentaion-center news-pg news margin-div show_consult">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="wow fadeIn border-title jobs-title">{{trans('local.documentations_systems')}} </h3>
                </div>
            @if(Auth::user()->hasRole('employee') &&Auth::user()->role=='e')
                @foreach($systems_e as $system_e)
                <!--start gallery-item-->
                <div class="col-lg-4 col-sm-6 wow fadeIn">
                    <div class="main-gallery-item">
                        <div class="worker-img-container">
                            <a href="{{$system_e->link}}">
                                <div class="full-width-img">
                                    <img src="{{asset('uploads/'.$system_e->image)}}" alt="img" class="converted-img"/>
                                </div>
                                <span class="galley-head"><span>{{$system_e->en_name}}</span>{{$system_e->name}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!--end gallery-item-->
                @endforeach
            @elseif(Auth::user()->hasRole('suppliers') &&Auth::user()->role=='s')
                <!--start gallery-item-->
                <div class="col-lg-4 col-sm-6 wow fadeIn">
                    <div class="main-gallery-item">
                        <div class="worker-img-container">
                            <a href="gallery-details.html">
                                <div class="full-width-img">
                                    <img src="images/pages/11.jpg" alt="img" class="converted-img"/>
                                </div>
                                <span class="galley-head"><span>car traking system</span> نظام تتبع السيارات</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!--end gallery-item-->
                @endif
                {{--<!--start gallery-item-->--}}
                {{--<div class="col-lg-4 col-sm-6 wow fadeIn">--}}
                {{--<div class="main-gallery-item">--}}
                {{--<div class="worker-img-container">--}}
                {{--<a href="gallery-details.html">--}}
                {{--<div class="full-width-img">--}}
                {{--<img src="images/pages/12.jpg" alt="img" class="converted-img"/>--}}
                {{--</div>--}}
                {{--<span class="galley-head"><span>time attendance system</span> نظام الحضور والانصراف</span>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<!--end gallery-item-->--}}

                <div class="col-12">
                    <h3 class="wow fadeIn border-title jobs-title">الوثائق </h3>
                </div>
                <ul class="list-unstyled products-btns col-12">
                    <li>
                        <span> قائمة أسعار المواد : اسم الملف</span>
                        <a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i
                                    class="fa  fa-file-pdf-o"></i> تحميل</a>
                    </li>

                    <li>
                        <span> دليل الموظفين  : اسم الملف</span>
                        <a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i
                                    class="fa  fa-file-pdf-o"></i> تحميل</a>
                    </li>

                    <li>
                        <span> الوثيقة التالتة   : اسم الملف</span>
                        <a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i
                                    class="fa  fa-file-pdf-o"></i> تحميل</a>
                    </li>

                    <li>
                        <span> الوثيقة الرابعة  : اسم الملف</span>
                        <a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i
                                    class="fa  fa-file-pdf-o"></i> تحميل</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!--end about-pg-->
@endsection