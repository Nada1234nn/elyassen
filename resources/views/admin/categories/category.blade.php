
@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    <a href="{{route('categories.index')}}">{{trans('local.categories')}}</a>
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

            <h3 class="dash-main-title col-12 wow fadeIn"><i class="fa fa-plus"></i>{{trans('local.hello_in')}} <span class="dash-title-span">{{isset($category)?trans('local.edit_category'):trans('local.add_category')}}
</span></h3>


            <div class="about-text-div col-12 margin-div2">
                <div class="container">
                    <form class="needs-validation row" method="post" enctype="multipart/form-data" action="{{ isset($category)? route('categories.update',$category->id):route('categories.store')}}" novalidate>
                        {!! csrf_field() !!}
                        @if(isset($category))
                            <input type="hidden" name="_method" value="PATCH" />
                        @endif

                        <div class="form-group col-12">
                            <label>{{trans('local.input_maincategory')}}</label>
                            <input type="text" class="form-control" value="{{isset($category)?$category->name:''}}" name="name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>{{trans('local.input_maincategoryEn')}} </label>
                            <input type="text" class="form-control" value="{{isset($category)?$category->en_name:''}}" name="en_name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <label>{{trans('local.icon_cat')}}</label>
                            <input type="file" name="icon_cat" id="chooseFile"
                                   value="{{isset($category)?$category->icon_cat:''}}" onchange="readURL(this);"
                                   class="form-control" {{isset($category)?:'required'}}>
                            <div class="invalid-feedback">
                                من فضلك أدخل ملف صحيح
                            </div>
                        </div>
                        <hr>

                        <div class="form-group col-12">
                            <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;
                    display: block;" align="center" src="{{isset($category)?asset('/uploads/'.$category->icon_cat):''}}"
                                 alt=""/>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">{{trans('local.descr')}}</label>
                            @if(isset($category))

                                    @if($category->attributes()->where('group_id', null)->count())
                                        @foreach($category->attributes()->where("group_id", null)->get() as $key => $group)
                                        <div class="col-12 row form-group itemsGroupsContainer">

                                            <div class="itemsContainer"
                                                 style="margin-top:5px; padding:5px; border:1px solid #eee">

                                                {{--<div class=" form-group col-md-6">--}}
                                                {{--<input type="hidden" name="group[4][attribute]"--}}
                                                {{--value="{{ $group->name }}"--}}
                                                {{--class="form-control" data-key="{{ $key }}"--}}
                                                {{--placeholder="المجموعه">--}}
                                                {{--</div>--}}

                                                {{--<div class=" form-group col-md-6">--}}
                                                {{--<input type="hidden" name="group[4][attribute_key]"--}}
                                                {{--value="[]"--}}
                                                {{--class="form-control" data-key="{{ $key }}"--}}
                                                {{--placeholder="المجموعه">--}}
                                                {{--</div>--}}
                                                {{--<div class=" form-group col-md-6">--}}
                                                {{--<input type="hidden" name="group[4][group_id]"--}}
                                                {{--value="{{4}}">--}}

                                                {{--</div>--}}

                                                @foreach($category->attributes->where("group_id", $group->id) as $attribute_key => $attribute_value)


                                                    <div class="col-12 row form-group" id="itemsContainer"
                                                         style="margin-top:5px">
                                                        <div class="form-group col-md-6">

                                                            <input type="text"
                                                                   name="group[4][attribute_key][{{ $attribute_key+1 }}]"
                                                                   value="{{ $attribute_value->name }}"
                                                                   class="form-control text"
                                                                   placeholder="{{trans('local.descr')}}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <input type="text"
                                                                   name="group[4][attribute_key][{{ $attribute_key+2}}]"
                                                                   value="{{ $attribute_value->en_name }}"
                                                                   class="form-control key"
                                                                   placeholder="{{trans('local.descr_en')}}" disabled>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a class="btn btn-danger btn-xs destroyItem"
                                                               onclick="return false;"
                                                               object_id="{{ $attribute_value->id }}"
                                                               delete_url="/deleteGroup/{{ $attribute_value->id }}"><i
                                                                        class="fa fa-times"></i></a>
                                                        </div>

                                                    </div>


                                                @endforeach


                                            </div>
                                        </div>
                                        @endforeach
                                    <div class="col-12 row form-group itemsGroupsContainer">

                                        <div class="itemsContainer">
                                            <div class=" form-group col-md-6">
                                                <input type="hidden" name="group[0][group_id]" class="group_id"
                                                       value="{{ $group->id }}">
                                                <input type="hidden" name="group[0][attribute]" value="edit"
                                                       class="form-control attribute" data-key="0"
                                                       placeholder="المجموعه">

                                            </div>


                                            <div class="col-lg-12 row form-group" style="margin-top:5px">
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="group[0][attribute_key][0]" value=""
                                                           class="form-control text"
                                                           placeholder="{{trans('local.descr')}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="group[0][attribute_key][1]" value=""
                                                           class="form-control key"
                                                           placeholder="{{trans('local.descr_en')}}">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-group col-md-6 ">
                                            <span class="custom_btn dark_btn addItemsGroup"><i class="fa fa-plus"></i>إضافة أخري</span>
                                        </div>
                                    </div>


                                @endif




                            @else

                                <div class="col-12 row form-group itemsGroupsContainer">
                                    <div class="itemsContainer">
                                        <div class=" form-group col-md-6">
                                            <input type="hidden" name="group[0][attribute]" value=""
                                                   class="form-control" data-key="0" placeholder="المجموعه">
                                        </div>



                                        <div class="col-12 row form-group" style="margin-top:5px">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="group[0][attribute_key][0]" value=""
                                                       class="form-control text" placeholder="{{trans('local.descr')}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="group[0][attribute_key][1]" value=""
                                                       class="form-control key"
                                                       placeholder="{{trans('local.descr_en')}}">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <span class="custom_btn dark_btn addItemsGroup"><i class="fa fa-plus"></i>إضافة أخري</span>
                                    </div>
                                </div>




                            @endif
                        </div>




                        <div class="left-btn col-12">
                            <button type="submit" class="custom_btn dark-btn"> {{isset($category)?trans('local.edit'):trans('local.save')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection