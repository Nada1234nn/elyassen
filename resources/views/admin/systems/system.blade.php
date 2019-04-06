@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('systems.index')}}">{{trans('local.systems')}}</a>
                    {{isset($system)?trans('local.edit_system'):trans('local.add_system')}}
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
                        class="dash-title-span">{{isset($system)?trans('local.edit_system'):trans('local.add_system')}}
            </span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data"
                          action="{{ isset($system)? route('systems.update',$system->id):route('systems.store')}}"
                          novalidate>
                        {!! csrf_field() !!}
                        @if(isset($system))
                            <input type="hidden" name="_method" value="PATCH"/>
                        @endif

                        <div class="form-group col-12">
                            <label>{{trans('local.name_system')}} </label>
                            <input type="text" class="form-control" value="{{isset($system)?$system->name:''}}"
                                   name="name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.enname_system')}} </label>
                            <input type="text" class="form-control" value="{{isset($system)?$system->en_name:''}}"
                                   name="en_name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>{{trans('local.system_follow')}}</label>
                            <select name="role_id" class="form-control" required>

                                @foreach($roles as $role)
                                    <option value="{{$role->id}}"{{isset($system)&&$system->role_id == $role->id?'selected':''}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.image_supplier')}}</label>
                            <input type="file" name="image" id="chooseFile"
                                   value="{{isset($system)?$system->image:''}}" onchange="readURL(this);"
                                   class="form-control" {{isset($system)?'':'required'}}>
                            <div class="invalid-feedback">
                                من فضلك أدخل ملف صحيح
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12">
                            <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;
                    display: block;" align="center" src="{{isset($system)?asset('/uploads/'.$system->image):''}}"
                                 alt=""/>

                        </div>


                        <div class="form-group col-12">
                            <label>{{trans('local.link_system')}} </label>
                            <input type="text" class="form-control"
                                   value="{{isset($system)?$system->link:''}}" name="link" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="left-btn col-12">
                            <button type="submit"
                                    class="custom_btn dark-btn"> {{isset($system)?trans('local.edit'):trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection











