@extends('website.layouts.layout')

@section('content')
    <!--start pages-header
             ================-->

    <section class="pages-header text-center suppliers-header">
        <div class="container">
            <div class="row">
                <h3 class="dark-title center-border-title border-title col-12 wow fadeIn"> {{$supplier->getUser->username}}</h3>
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
                <div class="col-12  about-descripe suppliers-inner-div res-marg wow fadeIn">
                    <div class="row workers suppliers">
                        <!--start worker-->
                        <div class="col-lg-4 col-md-5 wow fadeIn">
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
                                    <li><a href=""><i class="fa fa-link"></i> {{$supplier->url_website}}</a></li>
                                    <li><i class="fa fa-map-marker"></i>{{$supplier->address}} </li>
                                    <li class="additional-supp"><a href=""><i
                                                    class="fa fa-plus"></i> {{trans('local.insert_otherinformation')}}
                                        </a></li>

                                </ul>
                            </div>
                        </div>
                        <!--end worker-->

                        <!--start job-description-->
                        <div class="col-lg-8 col-md-7 wow fadeIn">
                            <div class="right-consult job-desciption">
                                <h2 class="wow fadeIn">{{trans('local.word_specialsup')}}</h2>
                                <p class="wow fadeIn">
                                    @if(session()->get('lang')=='en')
                                        {{$supplier->word_supplier_en}}
                                    @else

                                        {{$supplier->word_supplier}}
                                    @endif
                                    <br/> <br/>

                                </p>
                            </div>
                        </div>
                        <!--end job-description-->


                        <!--start products-pg-->
                        <div class="col-12 products-pg sup-products text-center">
                            <h3 class="dark-title center-border-title border-title col-12 wow fadeIn"> {{trans('local.products')}}</h3>
                            <div class="products-pg-div row" id="itemContainer3">

                            @foreach($products_sup as $product)
                                <!--start pro-div-->
                                    <div class="col-lg-4 col-sm-6 col-6">
                                        @if(session()->get('lang')=='en')
                                            <a href="{{route('website.detail_product',$product->en_name)}}">
                                                @else
                                                    <a href="{{route('website.detail_product',$product->name)}}">
                                                        @endif
                                                        <div class="pro-div">
                                                            <div class="pro-img">
                                                                <img src="{{asset('uploads/'.$product->image)}}"
                                                                     alt="product">
                                                                <span class="more-pro"> {{trans('local.descr_prod')}}</span>
                                                            </div>
                                                            @if(session()->get('lang')=='en')
                                                                <h3 class="pro-title">{{$product->en_name}} </h3>
                                                            @else
                                                                <h3 class="pro-title">{{$product->name}} </h3>
                                                            @endif

                                                            <a href="{{route('website.detail_supplier',$product->getSupplier->getUser->username)}}"
                                                               class="pro-price">{{trans('local.name_supplier')}}
                                                                :{{$product->getSupplier->getUser->username}} </a>
                                                            <span class="pro-price pro-made">{{trans('local.nationality')}}
                                                                :{{$product->getSupplier->national}}</span>

                                                        </div>
                                                        @if(session()->get('lang')=='en')

                                                    </a>
                                                    @else</a>
                                        @endif
                                    </div>
                                    <!--end pro-div-->

                                @endforeach


                            </div>
                            <div class="holder3 holder_pager"></div>
                        </div>
                        <!--end  products-pg-->


                    </div>
                </div>
                <!--end certificates-->

            </div>
        </div>
    </section>

    <!--end about-pg-->
@endsection