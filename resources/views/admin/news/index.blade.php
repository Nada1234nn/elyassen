@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="/dashboard"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.news')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.news')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.title_news')}}</th>
                        <th> {{trans('local.title_news_en')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @if($newss->isEmpty())
                    @else
                        @foreach($newss as $news)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$news->title}}</td>
                                <td>{{$news->en_title}}</td>
                                <td>{{$news->created_at->format("d/m/Y")}}</td>
                                <td>
                                    <a href="{{route('news.edit',$news->title)}}"
                                       class="edit-btn-table"><i class="fa fa-pencil"></i></a>


                                    <a title="حذف الخبر" onclick="return false;" object_id="{{ $news->id }}"
                                       delete_url="/news/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                        <i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('news.create')}}" class="custom_btn dark_btn">{{trans('local.add_news')}}</a>
            </div>

        </div>
    </div>
@endsection
