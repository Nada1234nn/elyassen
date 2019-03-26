
@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href=""><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="">{{trans('local.categories')}}</a>
                    {{isset($category)?trans('local.edit_category'):trans('local.add_category')}}
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

            <h3 class="dash-main-title col-12 wow fadeIn"><i class="fa fa-plus"></i>{{trans('local.hello_in')}} <span class="dash-title-span">{{trans('local.add_category')}}</span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data" action="{{ isset($category)? route('categories.update',$category->id):route('categories.store')}}" novalidate>
                        {!! csrf_field() !!}
                        @if(isset($category))
                            <input type="hidden" name="_method" value="PATCH" />
                        @endif

                        <div class="form-group col-12">
                            <label>{{trans('local.input_maincategory')}}</label>
                            <input type="text" class="form-control" name="name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.input_maincategoryEn')}} </label>
                            <input type="text" class="form-control" name="en_name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="left-btn col-12">
                            <button type="submit" class="custom_btn dark-btn"> {{trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection