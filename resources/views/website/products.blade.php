@extends('website.layouts.layout')

@section('content')
    <section class="pages-header text-center products-header">
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
                                            {{trans('local.search_supplier')}}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="needs-validation search_supplier" action="#"
                                              method="post" onsubmit="return false;" novalidate>
                                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                            <div class="form-group filter-search">
                                                <input type="text" name="supplier_id" class="form-control"
                                                       id="search_input3" placeholder="{{trans('local.enter_brand')}}">
                                                <div class="invalid-feedback">
                                                    من فضلك أدخل كلمة بحثية صحيحة
                                                </div>
                                                <button type="submit" class="search-btn2"><i class="fa fa-search"></i>
                                                </button>

                                            </div>

                                            <div class="check-boxes-group">
                                                <?php $i = 0; ?>
                                                @foreach($suppliers as $supplier)
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" name="supplier_name"
                                                               value="{{$supplier->getUser->username}}"
                                                               class="custom-control-input supplier_name_id"
                                                               id="{{$i}}">
                                                        <label class="custom-control-label"
                                                               for="{{$i}}">{{$supplier->getUser->username}} </label>
                                                    </div>
                                                    <?php $i++?>

                                                @endforeach
                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation12">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation12">ناو فودز (14)</label>--}}
                                                {{--</div>--}}

                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation13">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation13">ماركل (22)</label>--}}
                                                {{--</div>--}}


                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation14">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation14">بروبيس (16)</label>--}}
                                                {{--</div>--}}

                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation15">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation15">سيزر (10)</label>--}}
                                                {{--</div>--}}


                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation16">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation16">كرانكوش (18)</label>--}}
                                                {{--</div>--}}

                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation17">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation17">لاكي براند (19)</label>--}}
                                                {{--</div>--}}

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
                                            {{trans('local.search_categories')}}
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="needs-validation search_categories" onsubmit="return false;"
                                              novalidate>
                                            <div class="form-group filter-search search_category"
                                                 onsubmit="return false;">
                                                <input type="text" class="form-control" name="search_category"
                                                       id="search_input4" placeholder="{{trans('local.input_type')}} ">
                                                <div class="invalid-feedback">
                                                    من فضلك أدخل كلمة بحثية صحيحة
                                                </div>
                                                <button type="submit" class="search-btn2"><i class="fa fa-search"></i>
                                                </button>

                                            </div>
                                            <div class="check-boxes-group">
                                                <?php $i = 0; ?>

                                                @foreach($categories as $category)
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" name="category_name"
                                                               value="{{$category->name}}" class="custom-control-input"
                                                               id="{{'cat'.$i}}">
                                                        <label class="custom-control-label"
                                                               for="{{'cat'.$i}}">{{session()->get('lang')=='en'?$category->en_name:$category->name}} </label>
                                                    </div>
                                                    <?php $i++?>
                                                @endforeach
                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation21">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation21">البذور (7)</label>--}}
                                                {{--</div>--}}

                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation22">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation22">ألياف و أدوات زراعية (22)</label>--}}
                                                {{--</div>--}}


                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation23">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation23">المكافحة المتكاملة (16)</label>--}}
                                                {{--</div>--}}

                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation24">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation24">الحدائق و الصحة العامة (10)</label>--}}
                                                {{--</div>--}}
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
                                            {{trans('local.search_subcategories')}}
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="needs-validation search_subcategories" onsubmit="return false;"
                                              novalidate>
                                            <div class="form-group filter-search">
                                                <input type="text" class="form-control" name="search_subcategory"
                                                       id="search_input5" placeholder="{{trans('local.input_type')}} ">
                                                <div class="invalid-feedback">
                                                    من فضلك أدخل كلمة بحثية صحيحة
                                                </div>
                                                <button type="submit" class="search-btn2"><i class="fa fa-search"></i>
                                                </button>

                                            </div>
                                            <div class="check-boxes-group">
                                                <?php $i = 0;?>
                                                @foreach($subcategories as $subcategory)
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" name="subcategory_name"
                                                               value="{{$subcategory->name}}"
                                                               class="custom-control-input" id="{{'sub_cat'.$i}}">
                                                        <label class="custom-control-label"
                                                               for="{{'sub_cat'.$i}}">{{session()->get('lang')=='en'?$subcategory->en_name:$subcategory->name}}</label>
                                                    </div>
                                                    <?php $i++?>
                                                @endforeach
                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation31">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation31">أسمدة ورقية (7)</label>--}}
                                                {{--</div>--}}

                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation32">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation32">أسمدة سائلة (22)</label>--}}
                                                {{--</div>--}}


                                                {{--<div class="custom-control custom-checkbox mb-3">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customControlValidation33">--}}
                                                {{--<label class="custom-control-label" for="customControlValidation33">أسمدة حبيبية (16)</label>--}}
                                                {{--</div>--}}
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
                <div class="col-xl-9 col-lg-8 col-md-7 products-pg text-center">
                    <div class="news-search col-lg-8">
                        <form class="needs-validation search-form3 form-inline search_product" onsubmit="return false;"
                              novalidate>
                            <div class="form-group">
                                <label> {{trans('local.search')}} :</label>
                                <input type="text" class="form-control"
                                       placeholder="{{trans('local.public_search_product')}}" id="search_product">
                                <div class="invalid-feedback">
                                    من فضلك أدخل بحث صحيح
                                </div>
                                <button type="submit" class="search-btn2"><i class="fa fa-search"></i></button>

                            </div>
                        </form>
                    </div>
                    <div class="products-pg-div row" id="itemContainer">
                    @if(isset($products))
                        @if(count($products)>0)
                    @foreach($products as $product)
                        <!--start pro-div-->
                            <div class="col-lg-4 col-sm-6 col-6 wow fadeIn">
                                @if(session()->get('lang')=='en')
                                    <a href="{{route('website.detail_product',$product->en_name)}}">
                                        @else
                                            <a href="{{route('website.detail_product',$product->name)}}">
                                                @endif
                                                <div class="pro-div">
                                                    <div class="pro-img">
                                                        <img src="{{asset('uploads/'.$product->image)}}" alt="product">
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
                                @endif                        </div>
                            <!--end pro-div-->
@endforeach
                        @endif
                    @elseif(count($search_products)>0)
                        @foreach($search_products as $product)
                            <!--start pro-div-->
                                <div class="col-lg-4 col-sm-6 col-6 wow fadeIn">
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
                                    @endif                        </div>
                                <!--end pro-div-->
                            @endforeach
                        @else
                            <h1>{{trans('local.no_resultsearch')}}</h1>
                        @endif


                    </div>
                    <div class="holder1 holder_pager"></div>
                </div>
                <!--end  products-pg-->
            </div>
        </div>
    </section>

    <!--end about-pg-->
@endsection