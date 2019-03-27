@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.subcategories')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in').trans('local.subcategories')." "}}</h3>

            <div class="category-table wow fadeIn col-12">

                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.name_category')}}</th>
                        <th> {{trans('local.category_en')}}</th>
                        <th> {{trans('local.category_related')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1?>
                    @foreach($sub_categories as $sub_category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><a href="{{route('category',$sub_category->name)}}" style="color: blue;">{{$sub_category->name}}</a></td>
                            <td>{{$sub_category->en_name}}</td>
                            <td>{{$sub_category->parentCategory->name}}</td>
                            <td>{{$sub_category->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route('subcategories.edit',$sub_category->id)}}" class="edit-btn-table"><i class="fa fa-pencil"></i></a>


                                {{--<button class="edit-btn-table remove-btn sweet-2" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-2']);"><i class="fa fa-times"></i> </button>--}}
                                <a  title="حذف القسم" onclick="return false;" object_id="{{ $sub_category->id }}"
                                    delete_url="/subcategories/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                    <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('subcategories.create')}}" class="custom_btn dark_btn">{{trans('local.add_subcategory')}}</a>
            </div>

        </div>
    </div>
@endsection
