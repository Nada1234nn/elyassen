@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('users.index')}}">{{trans('local.users')}}</a>
                    {{isset($user)?trans('local.edit_user'):trans('local.add_user')}}
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
                        class="dash-title-span">{{isset($user)?trans('local.edit_user'):trans('local.add_user')}}
</span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data"
                          action="{{ isset($user)? route('users.update',$user->id):route('users.store')}}" novalidate>
                        {!! csrf_field() !!}
                        @if(isset($user))
                            <input type="hidden" name="_method" value="PATCH"/>
                        @endif

                        <div class="form-group col-12">
                            <label>{{trans('local.username')}}</label>
                            <input type="text" class="form-control" value="{{isset($user)?$user->username:''}}"
                                   name="username" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.email')}} </label>
                            <input type="text" class="form-control" value="{{isset($user)?$user->email:''}}"
                                   name="email" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <input type="password" class="form-control" id="password_input2" name="password"
                                   placeholder="{{trans('local.password')}}" {{isset($user)?:'required'}}>
                            <div class="invalid-feedback">
                                من فضلك أدخل رقم سري صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <input type="password" class="form-control" id="password_input22"
                                   name="password_confirmation"
                                   placeholder="{{trans('local.confirm_password')}}" {{isset($user)?:'required'}}>
                            <div class="invalid-feedback">
                                من فضلك أدخل رقم سري صحيح
                            </div>
                        </div>

                        <div class="left-btn col-12">
                            <button type="submit"
                                    class="custom_btn dark-btn"> {{isset($user)?trans('local.edit'):trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection