@extends('website.layouts.layout')

@section('content')
    <form action="{{route('update_orders')}}" method="post">
    {{csrf_field()}}
    <!--start pages-header
             ================-->

        <section class="pages-header text-center caret-header">
            <div class="container">
                <div class="row">
                    <h3 class="dark-title center-border-title border-title col-12 wow fadeIn">{{trans('local.shopping_cart')}}</h3>
                </div>
            </div>
        </section>
        <!--end pages-header-->

        <!--start about-pg
              ================-->

        <section class="about-pg margin-div">
            <div class="container">
                <div class="row">

                    <!--start caret-sec-->
                    <div class="col-12 products-pg product-details caret-sec">
                        <span class="slide-icon"></span>
                        <div class="row">
                            <!--start product-owl-->
                            <div class="col-lg-5  wow fadeIn">
                                <div id="owl-demo"
                                     class="text-center owl-carousel owl-theme first-owl product-carousel">
                                @foreach($images_pro as $image_pro)
                                    <!-- start owl-item -->
                                        <div class="item">
                                            <div class="pro-div">
                                                <div class="pro-img">
                                                    <a href="{{asset('uploads/'.$image_pro->image)}}"
                                                       class="html5lightbox"><img
                                                                src="{{asset('uploads/'.$image_pro->image)}}"
                                                                alt="product"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end owl-item -->


                                    @endforeach


                                </div>
                            </div>
                            <!--end product-owl-->

                            <!--start left-product-details-->
                            <div class="col-lg-7 caret-grid-left">
                                <div class="left-product-details wow fadeIn">
                                    <div class="pro-head">
                                        <h3 class="pro-title wow fadeIn">{{session()->get('lang')=='en'?$order_pro->getProduct->en_name:$order_pro->getProduct->name}}
                                            <span> {{$order_pro->getProduct->price.trans('local.riyal')}}</span></h3>
                                        <span class="pro-price wow fadeIn">{{trans('local.with').$order_pro->getProduct->getSupplier->getUser->username}}</span>
                                    </div>

                                    <div class="inner-pro-descripe">
                                        <span class="pro-gram">{{trans('local.total_size')}}
                                            <span>{{$order_pro->getProduct->weight_product.trans('local.gm')}} </span></span>
                                        <h3>{{trans('local.description')}} </h3>
                                        <p>{{session()->get('lang')=='en'?$order_pro->getProduct->descr_en:$order_pro->getProduct->descr}} </p>

                                    </div>

                                    <div class="pro-quantity">
                                        <h3>{{trans('local.required_quantity')}} </h3>
                                        <div class="order-counter">
                                            <input type="hidden" value="{{$order_pro->getProduct->quantity}}"
                                                   class="main_qty">
                                            <input type="hidden" name="product_id[]"
                                                   value="{{$order_pro->getProduct->id}}" class="product_id">


                                            <div class="qtyminus" id="minus"><i class="fa fa-minus"></i></div>
                                            <input type="text" name="quantity[]"
                                                   value="{{isset($order_pro)&&$order_pro->qty!=1?$order_pro->qty:1}}"
                                                   class="qty">
                                            {{--<input type="text" name="quantity" value="{{$product->quantity}}" class="qty">--}}
                                            <div class="qtyplus" id="plus"><i class="fa fa-plus"></i></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--start left-product-details-->


                        </div>

                    </div>
                    <!--end  caret-sec-->
                @if($orders->isEmpty())
                @else


                    @foreach($orders as $order)
                        <!--start caret-sec-->
                            <div class="col-12 products-pg product-details caret-sec">
                                <span class="slide-icon"></span>
                                <div class="row">
                                    <!--start product-owl-->
                                    <div class="col-lg-5  wow fadeIn">
                                        <div id="owl-demo"
                                             class="text-center owl-carousel owl-theme first-owl product-carousel">
                                        @foreach(\App\Models\Images::where('product_id',$order->getProduct->id)->get() as $image_pro)
                                            <!-- start owl-item -->
                                                <div class="item">
                                                    <div class="pro-div">
                                                        <div class="pro-img">
                                                            <a href="{{asset('uploads/'.$image_pro->image)}}"
                                                               class="html5lightbox"><img
                                                                        src="{{asset('uploads/'.$image_pro->image)}}"
                                                                        alt="product"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end owl-item -->


                                            @endforeach


                                        </div>
                                    </div>
                                    <!--end product-owl-->

                                    <!--start left-product-details-->
                                    <div class="col-lg-7 caret-grid-left">
                                        <div class="left-product-details wow fadeIn">
                                            <div class="pro-head">
                                                <h3 class="pro-title wow fadeIn">{{session()->get('lang')=='en'?$order->getProduct->en_name:$order->getProduct->name}}
                                                    <span> {{$order->getProduct->price.trans('local.riyal')}}</span>
                                                </h3>
                                                <span class="pro-price wow fadeIn">{{trans('local.with').$order->getProduct->getSupplier->getUser->username}}</span>
                                            </div>

                                            <div class="inner-pro-descripe">
                                                <span class="pro-gram">{{trans('local.total_size')}}
                                                    <span>{{$order->getProduct->weight_product.trans('local.gm')}} </span></span>
                                                <h3>{{trans('local.description')}} </h3>
                                                <p>{{session()->get('lang')=='en'?$order->getProduct->descr_en:$order->getProduct->descr}} </p>

                                            </div>

                                            <div class="pro-quantity">
                                                <h3>{{trans('local.required_quantity')}} </h3>
                                                <div class="order-counter">
                                                    <input type="hidden" value="{{$order->getProduct->quantity}}"
                                                           class="main_qty">
                                                    <input type="hidden" value="{{$order->getProduct->id}}"
                                                           class="product_id">
                                                    <input type="hidden" name="product_id[]"
                                                           value="{{$order->getProduct->id}}" class="product_id">

                                                    <div class="qtyminus"><i class="fa fa-minus"></i></div>
                                                    <input type="text" name="quantity[]" value="{{$order->qty}}"
                                                           class="qty">
                                                    <div class="qtyplus" id="plus"><i class="fa fa-plus"></i></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--start left-product-details-->


                                </div>

                            </div>
                            <!--end  caret-sec-->
                        @endforeach
                    @endif


                    <div class="caret-btns col-12">
                        <a href="{{route('website.product')}}" class="more_btn">{{trans('local.insert_other_product')}}
                            <i class="fa fa-plus"></i></a>
                        <button type="submit" href="{{route('website.order_product')}}"
                                class="custom_btn dark_btn left-cus-btn">{{trans('local.request_price')}}</button>
                        {{--<a href="{{route('website.order_product')}}" class="custom_btn dark_btn left-cus-btn">{{trans('local.request_price')}}</a>--}}

                    </div>


                </div>
            </div>
        </section>
    </form>
    <!--end about-pg-->
@endsection