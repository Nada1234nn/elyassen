@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.insert_photos')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.insert_photos')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th> {{trans('local.about_image')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($about_images as $about_image)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><img src="{{asset('uploads/'.$about_image->image)}}" class="t-pro-img"
                                     alt="img"/></td>
                            <td>{{$about_image->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route('about_images.edit',$about_image->id)}}" class="edit-btn-table"><i
                                            class="fa fa-pencil"></i></a>
                                <a title="حذف الصوره " onclick="return false;" object_id="{{ $about_image->id }}"
                                   delete_url="/about_images/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                    <i class="fa fa-times"></i></a>

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('about_images.create')}}"
                   class="custom_btn dark_btn">{{trans('local.add_aboutImages')}}</a>
            </div>

        </div>
    </div>
@endsection
