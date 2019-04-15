@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('dash_team.index')}}">{{trans('local.board_members')}}</a>
                    {{isset($member)?trans('local.edit_board_members'):trans('local.add_board_members')}}
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
                        class="dash-title-span">{{isset($member)?trans('local.edit_board_members'):trans('local.add_board_members')}}
            </span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data"
                          action="{{ isset($member)? route('dash_team.update',$member->id):route('dash_team.store')}}"
                          novalidate>
                        {!! csrf_field() !!}
                        @if(isset($member))
                            <input type="hidden" name="_method" value="PATCH"/>
                        @endif


                        <div class="form-group col-md-6">
                            <label>{{trans('local.chooseName_employee')}}</label>
                            <select name="membermanagement_id" class="form-control" required>
                                <option>{{trans('local.chooseName_employee')}}</option>

                                @foreach($users as $user)
                                    <option value="{{$user->id}}"{{isset($member)&&$member->getEmployee->getUser->username == $user->getUser->username?'selected':''}}>{{$user->getUser->username}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.title')}} </label>
                            <input type="text" class="form-control" name="title"
                                   value="{{isset($member)?$member->title:''}}" required>

                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.en_title')}} </label>
                            <input type="text" class="form-control" name="en_title"
                                   value="{{isset($member)?$member->en_title:''}}" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <label>{{trans('local.description')}} </label>
                            <textarea type="text" class="form-control" name="descr" required>
                                {{isset($member)?$member->descr:''}}
                            </textarea>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.description_en')}} </label>
                            <textarea type="text" class="form-control" name="en_descr" required>
                                {{isset($member)?$member->en_descr:''}}
                            </textarea>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="left-btn col-12">
                            <button type="submit"
                                    class="custom_btn dark-btn"> {{isset($member)?trans('local.edit'):trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection











