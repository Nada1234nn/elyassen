@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('about_images.index')}}">{{trans('local.insert_photos')}}</a>
                    {{isset($about_image)?trans('local.edit_photo'):trans('local.add_photo')}}
                </div>
            </div>
        </div>
    </div>
    @if (isset($errors))
        <div id="sweet_warning" style="display: none" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif
    @include('admin.alert')
    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title col-12 wow fadeIn"><i class="fa fa-plus"></i>{{trans('local.hello_in')}} <span
                        class="dash-title-span">{{isset($about_image)?trans('local.edit_photo'):trans('local.add_photo')}}
            </span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data"
                          action="{{ isset($about_image)? route('about_images.update',$about_image->id):route('about_images.store')}}"
                          novalidate>
                        {!! csrf_field() !!}
                        @if(isset($about_image))
                            <input type="hidden" name="_method" value="PATCH"/>
                        @endif

                        <div class="form-group col-12">
                            <label>{{trans('local.title')}} </label>
                            <input type="text" class="form-control"
                                   value="{{isset($about_image)?$about_image->title:''}}"
                                   name="title" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.en_title')}} </label>
                            <input type="text" class="form-control"
                                   value="{{isset($about_image)?$about_image->en_title:''}}"
                                   name="en_title" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.add_photo')}}</label>
                            <input type="file" name="image" id="chooseFile"
                                   value="{{isset($about_image)?$about_image->image:''}}" onchange="readURL(this);"
                                   class="form-control" {{isset($about_image)?:'required'}}>
                            <div class="invalid-feedback">
                                من فضلك أدخل ملف صحيح
                            </div>
                        </div>
                        <hr>

                        <div class="form-group col-12">
                            <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;
                    display: block;" align="center"
                                 src="{{isset($about_image)?asset('/uploads/'.$about_image->image):''}}"
                                 alt=""/>

                        </div>


                        <div class="left-btn col-12">
                            <button type="submit"
                                    class="custom_btn dark-btn"> {{isset($about_images)?trans('local.edit'):trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection











