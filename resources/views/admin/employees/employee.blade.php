@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('employees.index')}}">{{trans('local.employees')}}</a>
                    {{isset($employee)?trans('local.edit_employees'):trans('local.add_employee')}}
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
                        class="dash-title-span">                    {{isset($employee)?trans('local.edit_employees'):trans('local.add_employee')}}

            </span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data"
                          action="{{ isset($employee)? route('employees.update',$employee->id):route('employees.store')}}"
                          novalidate>
                        {!! csrf_field() !!}
                        @if(isset($employee))
                            <input type="hidden" name="_method" value="PATCH"/>
                        @endif

                        <div class="form-group col-md-6">
                            <label>{{trans('local.chooseName_employee')}}</label>
                            <select name="name_employee" class="form-control" required>
                                <option>{{trans('local.chooseName_employee')}}</option>

                                @foreach($users as $user)
                                    <option value="{{$user->id}}"{{isset($employee)&&$employee->getUser->username == $user->username?'selected':''}}>{{$user->username}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.about_image')}}</label>
                            <input type="file" name="image" id="chooseFile"
                                   value="{{isset($employee)?$employee->image:''}}" onchange="readURL(this);"
                                   class="form-control" {{isset($employee)?:'required'}}>
                            <div class="invalid-feedback">
                                من فضلك أدخل ملف صحيح
                            </div>
                        </div>
                        <hr>

                        <div class="form-group col-12">
                            <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;
                    display: block;" align="center" src="{{isset($employee)?asset('/uploads/'.$employee->image):''}}"
                                 alt=""/>

                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.phone')}} </label>
                            <input type="text" class="form-control" value="{{isset($employee)?$employee->phone:''}}"
                                   name="phone" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="left-btn col-12">
                            <button type="submit"
                                    class="custom_btn dark-btn"> {{isset($employee)?trans('local.edit'):trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection











