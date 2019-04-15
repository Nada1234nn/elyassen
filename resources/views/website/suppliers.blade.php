@extends('website.layouts.layout')

@section('content')
    <!--start pages-header
             ================-->

    <section class="pages-header text-center suppliers-header">
        <div class="container">
            <div class="row">
                <h3 class="dark-title center-border-title border-title col-12 wow fadeIn"> {{trans('local.suppliers')}}</h3>
            </div>
        </div>
    </section>
    <!--end pages-header-->



    <!--start about-pg
          ================-->

    <section class="about-pg margin-div gray-bg">
        <div class="container">
            <div class="row">
                <!--start certificates-->
                <div class="col-12  about-descripe res-marg wow fadeIn">
                    <div class="row workers suppliers">
                    @foreach($suppliers as $supplier)
                        <!--start worker-->
                            <div class="col-lg-4 col-sm-6 wow fadeIn">
                                <div class="worker">
                                    <div class="worker-img-container">
                                        <a href="{{route('website.detail_supplier',$supplier->getUser->username)}}">
                                            <div class="suppliers-img full-width-img">
                                                <img src="{{asset('uploads/'.$supplier->image)}}" alt="img"
                                                     class="converted-img"/>
                                            </div>
                                        </a>
                                    </div>


                                    <ul class="list-unstyled worker-list">
                                        <li class="news-title dark-title"> {{$supplier->getUser->username}}</li>
                                        <li><i class="fa fa-credit-card"></i> {{$supplier->address}}</li>

                                    </ul>
                                </div>
                            </div>
                            <!--end worker-->
                        @endforeach


                    </div>
                </div>
                <!--end certificates-->

            </div>
        </div>
    </section>

    <!--end about-pg-->

@endsection