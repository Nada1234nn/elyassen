@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href=""><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.main_categories')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span class="dash-title-span">{{trans('local.categories')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>{{trans('local.name')}}</th>
                        <th> {{trans('local.name_en')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    {{$i=1}}
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td><a href="#">{{$category->name}}</a></td>
                        <td>section name</td>
                        <td>19/9/2019</td>
                        <td>
                            <a href="edit-cat.html" class="edit-btn-table"><i class="fa fa-pencil"></i></a>
                            {{--<button class="edit-btn-table remove-btn sweet-2" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-2']);"><i class="fa fa-times"></i> </button>--}}
                            <a  title="حذف القسم" onclick="return false;"  delete_url="/categories/" class="edit-btn-table remove-btn sweet_warning edit-data removed-data" href="#">
                                <i class="fa fa-times"></i></a>                        </td>
                    </tr>
@endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('categories.create')}}" class="custom_btn dark_btn">{{trans('local.add_category')}}</a>
            </div>

        </div>
    </div>
    @endsection
