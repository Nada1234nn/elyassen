@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('suppliers.index')}}">{{trans('local.suppliers')}}</a>
                    {{isset($supplier)?trans('local.edit_supplier'):trans('local.add_supplier')}}
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
                        class="dash-title-span">{{isset($supplier)?trans('local.edit_supplier'):trans('local.add_supplier')}}
            </span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data"
                          action="{{ isset($supplier)? route('suppliers.update',$supplier->id):route('suppliers.store')}}"
                          novalidate>
                        {!! csrf_field() !!}
                        @if(isset($supplier))
                            <input type="hidden" name="_method" value="PATCH"/>
                        @endif

                        <div class="form-group col-12">
                            <label>{{trans('local.image_supplier')}}</label>
                            <input type="file" name="image_supplier" id="chooseFile"
                                   value="{{isset($supplier)?$supplier->image:''}}" onchange="readURL(this);"
                                   class="form-control" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل ملف صحيح
                            </div>
                        </div>
                        <hr>

                        <div class="form-group col-12">
                            <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;
                    display: block;" align="center" src="{{isset($supplier)?asset('/uploads/'.$supplier->image):''}}"
                                 alt=""/>

                        </div>

                        <div class="form-group col-md-6">
                            <label>{{trans('local.chooseName_supplier')}}</label>
                            <select name="supplier_id" class="form-control" required>
                                <option>{{trans('local.chooseName_supplier')}}</option>

                                @foreach($users as $user)
                                    <option value="{{$user->id}}"{{isset($supplier)&&$supplier->getUser->username == $user->username?'selected':''}}>{{$user->username}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <label>{{trans('local.address')}} </label>
                            <input type="text" class="form-control" value="{{isset($supplier)?$supplier->address:''}}"
                                   name="address" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.url_website')}} </label>
                            <input type="text" class="form-control"
                                   value="{{isset($supplier)?$supplier->url_website:''}}" name="url_website" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="left-btn col-12">
                            <button type="submit"
                                    class="custom_btn dark-btn"> {{isset($supplier)?trans('local.edit'):trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection











