@extends('website.layouts.layout')

@section('content')
    <!--start pages-header
             ================-->

    <section class="pages-header text-center products-details-header">
        <div class="container">
            <div class="row">
                <h3 class="dark-title center-border-title border-title col-12 wow fadeIn">{{trans('local.products')}}</h3>
            </div>
        </div>
    </section>
    <!--end pages-header-->

    <!--start about-pg
          ================-->

    <section class="about-pg margin-div">
        <div class="container">
            <div class="row">

                <!--start products-filter-->
                <div class="col-xl-3 col-lg-4 col-md-5 products-filter-grid res-marg wow fadeIn">
                    <div class="products-filter">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            البحث بالمورد
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate>
                                            <div class="form-group filter-search">
                                                <input type="text" class="form-control" id="search_input3"
                                                       placeholder="ادخل العلامة التجارية" required>
                                                <div class="invalid-feedback">
                                                    من فضلك أدخل كلمة بحثية صحيحة
                                                </div>
                                                <button type="submit" class="search-btn2"><i class="fa fa-search"></i>
                                                </button>

                                            </div>
                                            <div class="check-boxes-group">
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation1">
                                                    <label class="custom-control-label" for="customControlValidation1">البستان
                                                        (12)</label>
                                                </div>

                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation12">
                                                    <label class="custom-control-label" for="customControlValidation12">ناو
                                                        فودز (14)</label>
                                                </div>

                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation13">
                                                    <label class="custom-control-label" for="customControlValidation13">ماركل
                                                        (22)</label>
                                                </div>


                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation14">
                                                    <label class="custom-control-label" for="customControlValidation14">بروبيس
                                                        (16)</label>
                                                </div>

                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation15">
                                                    <label class="custom-control-label" for="customControlValidation15">سيزر
                                                        (10)</label>
                                                </div>


                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation16">
                                                    <label class="custom-control-label" for="customControlValidation16">كرانكوش
                                                        (18)</label>
                                                </div>

                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation17">
                                                    <label class="custom-control-label" for="customControlValidation17">لاكي
                                                        براند (19)</label>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                            البحث بالأقسام الرئيسية
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate>
                                            <div class="form-group filter-search">
                                                <input type="text" class="form-control" id="search_input4"
                                                       placeholder="ادخل النوع " required>
                                                <div class="invalid-feedback">
                                                    من فضلك أدخل كلمة بحثية صحيحة
                                                </div>
                                                <button type="submit" class="search-btn2"><i class="fa fa-search"></i>
                                                </button>

                                            </div>
                                            <div class="check-boxes-group">
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation2">
                                                    <label class="custom-control-label" for="customControlValidation2">الأسمدة
                                                        (12)</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation21">
                                                    <label class="custom-control-label" for="customControlValidation21">البذور
                                                        (7)</label>
                                                </div>

                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation22">
                                                    <label class="custom-control-label" for="customControlValidation22">ألياف
                                                        و أدوات زراعية (22)</label>
                                                </div>


                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation23">
                                                    <label class="custom-control-label" for="customControlValidation23">المكافحة
                                                        المتكاملة (16)</label>
                                                </div>

                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation24">
                                                    <label class="custom-control-label" for="customControlValidation24">الحدائق
                                                        و الصحة العامة (10)</label>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                            البحث بالأقسام الفرعية
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate>
                                            <div class="form-group filter-search">
                                                <input type="text" class="form-control" id="search_input5"
                                                       placeholder="ادخل النوع " required>
                                                <div class="invalid-feedback">
                                                    من فضلك أدخل كلمة بحثية صحيحة
                                                </div>
                                                <button type="submit" class="search-btn2"><i class="fa fa-search"></i>
                                                </button>

                                            </div>
                                            <div class="check-boxes-group">
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation3">
                                                    <label class="custom-control-label" for="customControlValidation3">أسمدة
                                                        ذوابة (12)</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation31">
                                                    <label class="custom-control-label" for="customControlValidation31">أسمدة
                                                        ورقية (7)</label>
                                                </div>

                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation32">
                                                    <label class="custom-control-label" for="customControlValidation32">أسمدة
                                                        سائلة (22)</label>
                                                </div>


                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlValidation33">
                                                    <label class="custom-control-label" for="customControlValidation33">أسمدة
                                                        حبيبية (16)</label>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end products-filter-->


                <!--start products-pg-->
                <div class="col-xl-9 col-lg-8 col-md-7 products-pg product-details">
                    <div class="row">
                        <div class="col-lg-6 pro-head">

                            @if( Auth::user() && Auth::user()->can('pro_name_'.$product->id))
                                <h3 class="pro-title wow fadeIn">{{session()->get('lang')=='en'?$product->en_name:$product->name}}
                                    <span></span></h3>
                            @elseif( !Auth::user() && $visitor->hasPermission('pro_name_'.$product->id)))
                            <h3 class="pro-title wow fadeIn">{{session()->get('lang')=='en'?$product->en_name:$product->name}}
                                <span></span></h3>

                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                <h3 class="pro-title wow fadeIn">{{session()->get('lang')=='en'?$product->en_name:$product->name}}
                                    <span></span></h3>

                            @endif

                            @if( Auth::user() && Auth::user()->can('supplier_pro_'.$product->id))
                                <span class="pro-price wow fadeIn">{{trans('local.with').' '.$product->getSupplier->getUser->username}} </span>

                            @elseif( !Auth::user() && $visitor->hasPermission('supplier_pro_'.$product->id)))
                            <span class="pro-price wow fadeIn">{{trans('local.with').' '.$product->getSupplier->getUser->username}} </span>

                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                <span class="pro-price wow fadeIn">{{trans('local.with').' '.$product->getSupplier->getUser->username}} </span>

                            @endif
                        </div>

                        <div class="col-lg-6 pro-soc wow fadeIn">
                            <div class="social-icons-pro">
                                <ul class="list-inline">
                                    <li class="share-soc"><a href="#" class="share_product"
                                                             product_id="{{$product->id}}"><i
                                                    class="fa fa-share-alt"></i></a></li>

                                    <li class="tw-soc"><a
                                                href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('website.detail_product',$product->name)}}"><i
                                                    class="fa fa-twitter"></i></a></li>
                                    <li class="goo-soc"><a
                                                href="https://plus.google.com/share?url={{route('website.detail_product',$product->name)}}"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                    <li class="fc-soc"><a
                                                href="https://www.facebook.com/sharer/sharer.php?u={{route('website.detail_product',$product->name)}}"
                                                class="social-button " id=""><i class="fa fa-facebook"></i></a></li>
                                    <li class="whats-soc"><a
                                                href="https://wa.me/?text={{route('website.detail_product',$product->name)}}"><i
                                                    class="fa fa-whatsapp"></i></a></li>


                                    <li class="fav-icon {{isset($like_product)&&\App\Models\Likes::where('user_id',Auth::id())->where('product_id',$product->id)->first()?'red-fav':''}}">
                                        <a href="#" class="like_product" onclick="return  false;"
                                           product_id="{{$product->id}}"><i class="fa fa-heart"
                                            ></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row border-div">
                    @if( Auth::user() && Auth::user()->can('subphotos_pro_'.$product->id))
                        <!--start product-owl-->
                            <div class="col-lg-6 no-padd wow fadeIn">
                                <div id="owl-demo"
                                     class="text-center owl-carousel owl-theme first-owl product-carousel">
                                @foreach($images as $image)
                                    <!-- start owl-item -->
                                        <div class="item">
                                            <a href="{{asset('uploads/'.$image->image)}}"
                                               class="html5lightbox  pro-plus"><i class="fa fa-search-plus"></i></a>

                                            <div class="pro-div">
                                                <div class="pro-img">
                                                    <a href="{{asset('uploads/'.$image->image)}}" class="html5lightbox"><img
                                                                src="{{asset('uploads/'.$image->image)}}" alt="product"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end owl-item -->
                                    @endforeach


                                </div>
                            </div>
                            <!--end product-owl-->
                        @elseif( !Auth::user() && $visitor->hasPermission('subphotos_pro_'.$product->id)))
                        <!--start product-owl-->
                        <div class="col-lg-6 no-padd wow fadeIn">
                            <div id="owl-demo"
                                 class="text-center owl-carousel owl-theme first-owl product-carousel">
                            @foreach($images as $image)
                                <!-- start owl-item -->
                                    <div class="item">
                                        <a href="{{asset('uploads/'.$image->image)}}"
                                           class="html5lightbox  pro-plus"><i class="fa fa-search-plus"></i></a>

                                        <div class="pro-div">
                                            <div class="pro-img">
                                                <a href="{{asset('uploads/'.$image->image)}}" class="html5lightbox"><img
                                                            src="{{asset('uploads/'.$image->image)}}" alt="product"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end owl-item -->
                                @endforeach


                            </div>
                        </div>
                        <!--end product-owl-->
                    @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                        <!--start product-owl-->
                            <div class="col-lg-6 no-padd wow fadeIn">
                                <div id="owl-demo"
                                     class="text-center owl-carousel owl-theme first-owl product-carousel">
                                @foreach($images as $image)
                                    <!-- start owl-item -->
                                        <div class="item">
                                            <a href="{{asset('uploads/'.$image->image)}}"
                                               class="html5lightbox  pro-plus"><i class="fa fa-search-plus"></i></a>

                                            <div class="pro-div">
                                                <div class="pro-img">
                                                    <a href="{{asset('uploads/'.$image->image)}}" class="html5lightbox"><img
                                                                src="{{asset('uploads/'.$image->image)}}" alt="product"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end owl-item -->
                                    @endforeach


                                </div>
                            </div>
                            <!--end product-owl-->
                    @endif



                    <!--start left-product-details-->
                        <div class="col-lg-6 no-padd">
                            <div class="left-product-details wow fadeIn">


                                <div class="inner-pro-descripe">
                                    <span class="pro-gram">{{trans('local.total_size')}}
                                        <select class="form-control">
                                            @foreach($weight_pro as $weight)
                                                <option>{{$weight.trans('local.gm')}} </option>
                                            @endforeach
                                        </select>
                                    </span>

                                    @if(Auth::user())
                                        <a href="material-request.html" class="dark_btn custom_btn big-btn">طلب منتج</a>
                                    @endif
                                    <h3>{{trans('local.information_additional')}}</h3>
                                    {{--<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من </p>--}}

                                    <div class="text-center">
                                        <ul class="list-unstyled products-btns">
                                            @if( Auth::user() && Auth::user()->can('attach_pro_'.$product->id))
                                                @foreach($products_publication as$product_publication)
                                                    <li>
                                                        <span> {{trans('local.technical_sheet')}} : </span>
                                                        <a href="{{route('website.viewAttach',$product_publication->attachment)}}"
                                                           class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>
                                                            النشرة الفنية</a>
                                                    </li>
                                                @endforeach

                                            @elseif( !Auth::user() && $visitor->hasPermission('attach_pro_'.$product->id))
                                                )
                                                @foreach($products_publication as$product_publication)
                                                    <li>
                                                        <span> {{trans('local.technical_sheet')}} : </span>
                                                        <a href="{{route('website.viewAttach',$product_publication->attachment)}}"
                                                           class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>
                                                            النشرة الفنية</a>
                                                    </li>
                                                @endforeach

                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                @foreach($products_publication as$product_publication)
                                                    <li>
                                                        <span> {{trans('local.technical_sheet')}} : </span>
                                                        <a href="{{route('website.viewAttach',$product_publication->attachment)}}"
                                                           class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>
                                                            النشرة الفنية</a>
                                                    </li>
                                                @endforeach

                                            @endif



                                            {{--<li>--}}
                                            {{--<span>  technical sheet : </span>--}}
                                            {{--<a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i> technical sheet</a>--}}
                                            {{--</li>--}}

                                            {{--<li>--}}
                                            {{--<span>المعلن : </span>--}}
                                            {{--<a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i> المعلن </a>--}}
                                            {{--</li>--}}


                                            {{--<li>--}}
                                            {{--<span>المعلن : </span>--}}
                                            {{--<a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i> المعلن </a>--}}
                                            {{--</li>--}}



                                            {{--<li>--}}
                                            {{--<span>المعلن : </span>--}}
                                            {{--<a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i> المعلن </a>--}}
                                            {{--</li>--}}


                                            {{--<li>--}}
                                            {{--<span>اخرى : </span>--}}
                                            {{--<a href="http://sunny.freeservers.com/fun/flowers.pdf" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i> اخرى</a>--}}
                                            {{--</li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--start left-product-details-->


                    </div>

                    <div class="row">


                        <!--start main-product-details-->
                        <div class="col-12">
                            <div class="main-product-details wow fadeIn">
                                <h3>{{trans('local.information_product')}}</h3>
                                <div class="inner-product-pro row">
                                    <div class="col-lg-7">
                                        <h4>{{trans('local.description')}}</h4>
                                        @if( Auth::user() && Auth::user()->can('descr_pro_'.$product->id))
                                            <p>{{session()->get('lang')=='en'?$product->descr_en:$product->descr}} </p>

                                        @elseif( !Auth::user() && $visitor->hasPermission('descr_pro_'.$product->id)))
                                        <p>{{session()->get('lang')=='en'?$product->descr_en:$product->descr}} </p>

                                        @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                            <p>{{session()->get('lang')=='en'?$product->descr_en:$product->descr}} </p>

                                        @endif


                                        <h4>{{trans('local.descriptions_pro')}}</h4>


                                        <ul class="list-unstyled pro-list wow fadeIn">
                                            @if( Auth::user() && Auth::user()->can('attribute_category_pro_'.$product->id))
                                                @foreach($attribures_product as $attribure_product)
                                                    <li class="wow fadeInUp">
                                                        <span class="main-right-desc">{{$attribure_product["name"]}}</span>
                                                        <span class="main-left-desc">{{session()->get('lang')=='en'?$attribure_product["pivot"]["attribute_value_en"]:$attribure_product["pivot"]["attribute_value"]}}</span>
                                                    </li>
                                                @endforeach
                                            @elseif( !Auth::user() && $visitor->hasPermission('attribute_category_pro_'.$product->id))
                                                )
                                                @foreach($attribures_product as $attribure_product)
                                                    <li class="wow fadeInUp">
                                                        <span class="main-right-desc">{{$attribure_product["name"]}}</span>
                                                        <span class="main-left-desc">{{session()->get('lang')=='en'?$attribure_product["pivot"]["attribute_value_en"]:$attribure_product["pivot"]["attribute_value"]}}</span>
                                                    </li>
                                                @endforeach
                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                @foreach($attribures_product as $attribure_product)
                                                    <li class="wow fadeInUp">
                                                        <span class="main-right-desc">{{$attribure_product["name"]}}</span>
                                                        <span class="main-left-desc">{{session()->get('lang')=='en'?$attribure_product["pivot"]["attribute_value_en"]:$attribure_product["pivot"]["attribute_value"]}}</span>
                                                    </li>
                                                @endforeach
                                            @endif


                                            {{--<li class="wow fadeInUp">--}}
                                            {{--<span class="main-right-desc">UPC - A</span>--}}
                                            {{--<span class="main-left-desc">6788558908</span>--}}
                                            {{--</li>--}}

                                            {{--<li class="wow fadeInUp">--}}
                                            {{--<span class="main-right-desc">UPC - E</span>--}}
                                            {{--<span class="main-left-desc">6788558908</span>--}}
                                            {{--</li>--}}
                                            @if( Auth::user() && Auth::user()->can('supplier_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.trade_mark')}}</span>
                                                    <span class="main-left-desc">{{$product->getSupplier->getUser->username}}</span>
                                                </li>

                                            @elseif( !Auth::user() && $visitor->hasPermission('supplier_pro_'.$product->id))
                                                )
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.trade_mark')}}</span>
                                                    <span class="main-left-desc">{{$product->getSupplier->getUser->username}}</span>
                                                </li>

                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.trade_mark')}}</span>
                                                    <span class="main-left-desc">{{$product->getSupplier->getUser->username}}</span>
                                                </li>

                                            @endif

                                            @if( Auth::user() && Auth::user()->can('cat_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.type')}}</span>
                                                    <span class="main-left-desc">{{session()->get('lang')=='en'?$product->getCategories->en_name:$product->getCategories->name}}</span>
                                                </li>

                                            @elseif( !Auth::user() && $visitor->hasPermission('cat_pro_'.$product->id)))
                                            <li class="wow fadeInUp">
                                                <span class="main-right-desc">{{trans('local.type')}}</span>
                                                <span class="main-left-desc">{{session()->get('lang')=='en'?$product->getCategories->en_name:$product->getCategories->name}}</span>
                                            </li>

                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.type')}}</span>
                                                    <span class="main-left-desc">{{session()->get('lang')=='en'?$product->getCategories->en_name:$product->getCategories->name}}</span>
                                                </li>

                                            @endif

                                            @if( Auth::user() && Auth::user()->can('weight_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.total_size')}}</span>
                                                    <span class="main-left-desc">{{$product->weight_product}}</span>
                                                </li>

                                            @elseif( !Auth::user() && $visitor->hasPermission('weight_pro_'.$product->id))
                                                )
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.total_size')}}</span>
                                                    <span class="main-left-desc">{{$product->weight_product}}</span>
                                                </li>

                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.total_size')}}</span>
                                                    <span class="main-left-desc">{{$product->weight_product}}</span>
                                                </li>

                                            @endif

                                            @if( Auth::user() && Auth::user()->can('fill_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.fill_product')}}</span>
                                                    <span class="main-left-desc">{{session()->get('lang')=='en'?$product->fill_product_en:$product->fill_product}}</span>
                                                </li>
                                            @elseif( !Auth::user() && $visitor->hasPermission('fill_pro_'.$product->id))
                                                )
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.fill_product')}}</span>
                                                    <span class="main-left-desc">{{session()->get('lang')=='en'?$product->fill_product_en:$product->fill_product}}</span>
                                                </li>
                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.fill_product')}}</span>
                                                    <span class="main-left-desc">{{session()->get('lang')=='en'?$product->fill_product_en:$product->fill_product}}</span>
                                                </li>
                                            @endif


                                            @if( Auth::user() && Auth::user()->can('organic_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.organic')}}</span>
                                                    <span class="main-left-desc">{{isset($product)&&$product->free_sugar==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>

                                            @elseif( !Auth::user() && $visitor->hasPermission('organic_pro_'.$product->id))
                                                )
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.organic')}}</span>
                                                    <span class="main-left-desc">{{isset($product)&&$product->free_sugar==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>

                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.organic')}}</span>
                                                    <span class="main-left-desc">{{isset($product)&&$product->free_sugar==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>

                                            @endif


                                            @if( Auth::user() && Auth::user()->can('freesugar_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.free_sugar')}}</span>
                                                    <span class="main-left-desc">{{isset($product)&&$product->free_sugar==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>


                                            @elseif( !Auth::user() && $visitor->hasPermission('freesugar_'.$product->id))
                                                )
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.free_sugar')}}</span>
                                                    <span class="main-left-desc">{{isset($product)&&$product->free_sugar==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>


                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.free_sugar')}}</span>
                                                    <span class="main-left-desc">{{isset($product)&&$product->free_sugar==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>


                                            @endif

                                            @if( Auth::user() && Auth::user()->can('freelactose_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.free_lactose')}}</span>
                                                    <span class="main-left-desc">
                                                    {{isset($product)&&$product->free_lactose==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>

                                            @elseif( !Auth::user() && $visitor->hasPermission('freelactose_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.free_lactose')}}</span>
                                                    <span class="main-left-desc">
                                                    {!! isset($product)&&$product->free_lactose==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>' !!}</span>
                                                </li>

                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.free_lactose')}}</span>
                                                    <span class="main-left-desc">
                                                    {{isset($product)&&$product->free_lactose==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>

                                            @endif


                                            @if( Auth::user() && Auth::user()->can('underexpire_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.underexpire_pro')}}</span>
                                                    <span class="main-left-desc">
                                                    {{isset($product)&&$product->under_expire==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>

                                            @elseif( !Auth::user() && $visitor->hasPermission('underexpire_pro_'.$product->id))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.underexpire_pro')}}</span>
                                                    <span class="main-left-desc">
                                                    {{isset($product)&&$product->under_expire==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>

                                            @elseif(Auth::user() && Auth::user()->role=='admin' &&Auth::User()->hasRole('admin'))
                                                <li class="wow fadeInUp">
                                                    <span class="main-right-desc">{{trans('local.underexpire_pro')}}</span>
                                                    <span class="main-left-desc">
                                                    {{isset($product)&&$product->under_expire==2?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>'}}</span>
                                                </li>

                                            @endif


                                            {{--<li class="wow fadeInUp">--}}
                                            {{--<span class="main-right-desc">الرقم اللميز للسلعة</span>--}}
                                            {{--<span class="main-left-desc">6788558908</span>--}}
                                            {{--</li>--}}

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end main-product-details--->

                    </div>
                </div>
                <!--end  products-pg-->

            </div>
        </div>
    </section>

    <!--end about-pg-->
@endsection