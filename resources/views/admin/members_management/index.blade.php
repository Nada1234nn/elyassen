@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.board_members')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.board_members')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.name_member')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($senior_members as $senior_member)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$senior_member->getEmployee->getUser->username}}</td>
                            <td>{{$senior_member->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route('dash_team.edit',$senior_member->getEmployee->getUser->username)}}"
                                   class="edit-btn-table"><i class="fa fa-pencil"></i></a>


                                <a title="حذف العضو" onclick="return false;" object_id="{{ $senior_member->id }}"
                                   delete_url="/dash_team/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                    <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('dash_team.create')}}"
                   class="custom_btn dark_btn">{{trans('local.add_senior_member')}}</a>
            </div>

        </div>
    </div>
@endsection
