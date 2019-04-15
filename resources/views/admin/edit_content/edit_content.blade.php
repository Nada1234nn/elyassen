@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.edit_content')}}
                </div>
            </div>
        </div>
    </div>
    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">
            <h3 class="dash-main-title col-12 wow fadeIn"><i class="fa fa-plus"></i>{{trans('local.edit_content')}}
            </h3>
        </div>
    </div>
    <div class="add-product-form margin-div2">
        <div class="container">
            <form class="needs-validation" id="myForm" method="post"
                  action="{{isset($about_us)? route('about_editcontent.update',$about_us->id):route('about_editcontent.store')}}"
                  novalidate="novalidate" enctype="multipart/form-data">

                {!! csrf_field() !!}
                @if(isset($about_us))
                    <input type="hidden" name="_method" value="PATCH"/>
                @endif

                <div class="form-group col-12">
                    <label>{{trans('local.title')}} </label>
                    <input type="text" class="form-control" value="{{isset($about_us)?$about_us->title:''}}"
                           name="title" required>
                    <div class="invalid-feedback">
                        من فضلك أدخل نص صحيح
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>{{trans('local.en_title')}} </label>
                    <input type="text" class="form-control" value="{{isset($about_us)?$about_us->en_title:''}}"
                           name="en_title" required>
                    <div class="invalid-feedback">
                        من فضلك أدخل نص صحيح
                    </div>
                </div>


                <div class="form-group col-12">
                    <label>{{trans('local.description')}} </label>
                    <textarea type="text" class="form-control" name="descr" required>{{isset($about_us)?$about_us->descr:''}}
                            </textarea>
                    <div class="invalid-feedback">
                        من فضلك أدخل نص صحيح
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>{{trans('local.description_en')}} </label>
                    <textarea type="text" class="form-control" name="descr_en" required>{{isset($about_us)?$about_us->descr_en:''}}
                            </textarea>
                    <div class="invalid-feedback">
                        من فضلك أدخل نص صحيح
                    </div>
                </div>

                <div class="text-center form-group col-12">
                    <button type="submit"
                            class="custom_btn dark-btn"> {{isset($about_us)?trans('local.edit'):trans('local.save')}}</button>
                </div>

            </form>
        </div>

    </div>
@endsection