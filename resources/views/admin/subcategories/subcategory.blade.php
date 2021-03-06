
@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('categories.index')}}">{{trans('local.categories')}}</a>
                    {{isset($sub_category)?trans('local.edit_subcategory'):trans('local.add_subcategory')}}
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

            <h3 class="dash-main-title col-12 wow fadeIn"><i class="fa fa-plus"></i>{{trans('local.hello_in')}} <span class="dash-title-span">{{isset($sub_category)?trans('local.edit_subcategory'):trans('local.add_subcategory')}}
</span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data" action="{{ isset($sub_category)? route('subcategories.update',$sub_category->id):route('subcategories.store')}}" novalidate>
                        {!! csrf_field() !!}
                        @if(isset($sub_category))
                            <input type="hidden" name="_method" value="PATCH" />
                        @endif

                        <div class="form-group col-md-6">
                            <label>{{trans('local.chooseMain_category')}}</label>
                            <select name="parent_id" class="form-control" required>
                                <option>{{trans('local.chooseMain_category')}}</option>

                            @foreach($categories as $category)
                                <option value="{{$category->id}}"{{isset($sub_category)&&$sub_category->parentCategory->name == $category->name?'selected':''}}>{{$category->name}}</option>
                               @endforeach
                            </select>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.input_subcategory')}}</label>
                            <input type="text" class="form-control" value="{{isset($sub_category)?$sub_category->name:''}}" name="name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.input_subcategoryEn')}} </label>
                            <input type="text" class="form-control" value="{{isset($sub_category)?$sub_category->en_name:''}}" name="en_name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="left-btn col-12">
                            <button type="submit" class="custom_btn dark-btn"> {{isset($sub_category)?trans('local.edit'):trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection