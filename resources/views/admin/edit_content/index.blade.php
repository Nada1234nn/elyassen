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

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.edit_content')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.title')}}</th>
                        <th> {{trans('local.en_title')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($static_pages as $static_page)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$static_page->title}}</td>
                            <td>{{$static_page->en_title}}</td>
                            <td>{{$static_page->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route('about_editcontent.edit',$static_page->id)}}" class="edit-btn-table"><i
                                            class="fa fa-pencil"></i></a>


                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('about_editcontent.create')}}"
                   class="custom_btn dark_btn">{{trans('local.add_aboutEditContent')}}</a>
            </div>

        </div>
    </div>
@endsection
