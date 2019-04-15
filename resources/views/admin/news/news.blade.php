@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('news.index')}}">{{trans('local.news')}}</a>
                    {{isset($news)?trans('local.edit_news'):trans('local.add_news')}}
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
                        class="dash-title-span">{{isset($news)?trans('local.edit_news'):trans('local.add_news')}}
            </span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data"
                          action="{{ isset($news)? route('news.update',$news->id):route('news.store')}}"
                          novalidate>
                        {!! csrf_field() !!}
                        @if(isset($news))
                            <input type="hidden" name="_method" value="PATCH"/>
                        @endif

                        <div class="form-group col-12">
                            <label>{{trans('local.title_news')}} </label>
                            <input type="text" class="form-control" value="{{isset($news)?$news->title:''}}"
                                   name="title" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.title_news_en')}} </label>
                            <input type="text" class="form-control" value="{{isset($news)?$news->en_title:''}}"
                                   name="en_title" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <label>{{trans('local.description')}} </label>
                            <textarea type="text" class="form-control" name="descr" required>{{isset($news)?$news->descr:''}}
                            </textarea>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.description_en')}} </label>
                            <textarea type="text" class="form-control" name="en_descr" required>{{isset($news)?$news->en_descr:''}}
                            </textarea>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-check custom-control  form-check-inline">
                                <label>{{trans('local.place_news')}}</label>
                                <input class="custom-control-input chooseSlider" name="slider" type="checkbox"
                                       id="inlineCheckbox1" value="1" {{isset($news)&&$news->slider==1?'checked':''}}>
                                <label class="custom-control-label"
                                       for="inlineCheckbox1">{{trans('local.slider')}}</label>
                            </div>
                            <div class="form-check custom-control  form-check-inline">
                                <input class="custom-control-input chooseLastNews" name="last_news" type="checkbox"
                                       id="inlineCheckbox2"
                                       value="1" {{isset($news)&&$news->last_news==1?'checked':''}}>
                                <label class="custom-control-label"
                                       for="inlineCheckbox2">{{trans('local.last_news')}}</label>
                                <div class="invalid-feedback">
                                    من فضلك اختر اختيار صحيح
                                </div>
                            </div>
                        </div>
                        {{--<div class="row" id="image_slidershow">--}}


                        <div class="form-group col-12">
                            <label>{{trans('local.image_news')}}</label>
                            <input type="file" name="image" id="chooseFile"
                                   value="{{isset($news)?$news->image:''}}" onchange="readURL(this);"
                                   class="form-control" {{isset($news)?'':'required'}}>
                            <div class="invalid-feedback">
                                من فضلك أدخل ملف صحيح
                            </div>
                        </div>
                        <hr>

                        <div class="form-group col-12">
                            <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;
                        display: block;" align="center" src="{{isset($news)?asset('/uploads/'.$news->image):''}}"
                                 alt=""/>

                        </div>
                        {{--</div>--}}
                        <div class="form-group col-12">
                            <input type="text" name="title_image" value="{{isset($news)?$news->title_image:''}}"
                                   class="form-control key"
                                   placeholder="{{trans('local.title_image')}}">
                        </div>

                        <div class="form-group col-12">
                            <input type="text" name="titleen_image" value="{{isset($news)?$news->titleen_image:''}}"
                                   class="form-control key"
                                   placeholder="{{trans('local.titleen_image')}}">
                            {{--</div>--}}

                            {{--<div class="input-group control-group increment" >--}}
                            {{--<input type="file" name="filename[]" onchange="readClONEURL(this);" value="{{isset($img_news)?$img_news->image:''}}" class="form-control">--}}
                            {{--<div class="input-group-btn">--}}
                            {{--<button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-6">--}}
                            {{--<input type="text" name="title_image[]" value="{{isset($img_news)?$img_news->title:''}}"--}}
                            {{--class="form-control key"--}}
                            {{--placeholder="{{trans('local.title_image')}}">--}}
                            {{--</div>--}}

                            {{--<div class="form-group col-md-6">--}}
                            {{--<input type="text" name="titleen_image[]" value="{{isset($img_news)?$img_news->en_title:''}}"--}}
                            {{--class="form-control key"--}}
                            {{--placeholder="{{trans('local.titleen_image')}}">--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-12">--}}
                            {{--<img width="150" height="100px" class="thumb-preview" id="clone_image" style="margin: auto auto 10px;--}}
                            {{--display: block;" align="center" src="{{isset($img_news)?asset('/uploads/'.$img_news->image):''}}"--}}
                            {{--alt=""/>--}}

                            {{--</div>--}}

                            {{--</div>--}}
                            {{--@if(isset($images_news ))--}}
                            {{--@foreach($images_news as $img_news)--}}
                            {{--<div class="input-group control-group increment" >--}}
                            {{--<input type="file" name="filename[]" onchange="readClONEURL(this);" value="{{isset($img_news)?$img_news->image:''}}" class="form-control">--}}
                            {{--<div class="input-group-btn">--}}
                            {{--<button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-6">--}}
                            {{--<input type="text" name="title_image[]" value="{{isset($img_news)?$img_news->title:''}}"--}}
                            {{--class="form-control key"--}}
                            {{--placeholder="{{trans('local.title_image')}}">--}}
                            {{--</div>--}}

                            {{--<div class="form-group col-md-6">--}}
                            {{--<input type="text" name="titleen_image[]" value="{{isset($img_news)?$img_news->en_title:''}}"--}}
                            {{--class="form-control key"--}}
                            {{--placeholder="{{trans('local.titleen_image')}}">--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-12">--}}
                            {{--<img width="150" height="100px" class="thumb-preview" id="clone_image" style="margin: auto auto 10px;--}}
                            {{--display: block;" align="center" src="{{isset($img_news)?asset('/uploads/'.$img_news->image):''}}"--}}
                            {{--alt=""/>--}}

                            {{--</div>--}}

                            {{--</div>--}}
                            {{--@endforeach--}}
                            {{--@endif--}}

                            {{--<div class="clone hide">--}}
                            {{--<div class="control-group input-group" style="margin-top:10px">--}}
                            {{--<input type="file" name="filename[]" value="{{isset($image_news)?$image_news->image:''}}" class="form-control" onchange="readImageURL(this);">--}}
                            {{--<div class="input-group-btn">--}}
                            {{--<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-6">--}}
                            {{--<input type="text" name="title_image[]" value="{{isset($image_news)?$image_news->title:''}}"--}}
                            {{--class="form-control key"--}}
                            {{--placeholder="{{trans('local.title_image')}}">--}}
                            {{--</div>--}}

                            {{--<div class="form-group col-md-6">--}}
                            {{--<input type="text" name="titleen_image[]" value="{{isset($image_news)?$image_news->en_title:''}}"--}}
                            {{--class="form-control key"--}}
                            {{--placeholder="{{trans('local.titleen_image')}}">--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-12">--}}
                            {{--<img width="150" height="100px" class="thumb-preview" id="image" style="margin: auto auto 10px;--}}
                            {{--display: block;" align="center" src="{{isset($image_news)?asset('/uploads/'.$image_news->image):''}}"--}}
                            {{--alt=""/>--}}

                            {{--</div>--}}

                            {{--</div>--}}
                            {{--</div>--}}


                            <div class="form-group col-12">
                                <label>{{trans('local.link')}} </label>
                                <input type="text" class="form-control"
                                       value="{{isset($news)?$news->link:''}}" name="link" required>
                                <div class="invalid-feedback">
                                    من فضلك أدخل نص صحيح
                                </div>
                            </div>


                            <div class="left-btn col-12">
                                <button type="submit"
                                        class="custom_btn dark-btn"> {{isset($news)?trans('local.edit'):trans('local.save')}}</button>
                            </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection











