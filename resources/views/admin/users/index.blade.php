@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="/dashboard"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.users')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.users')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.username')}}</th>
                        <th> {{trans('local.email')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a title="{{ $user->role != 'admin' ? 'اجعله مديرا' : 'اجعله عضو عادى' }}"
                                   href="/admin_user/{{$user->id}}"><i class="fa fa-user-circle-o"></i></a>
                                @if($user->role !='block')
                                    <a title="{{ $user->role != 'block' ? 'حظر العضو' : 'فك الحظر' }}"
                                       href="/block_user/{{ $user->id }}">
                                        <i class="fa fa-user-circle" style="color: red"></i></a>
                                @else
                                    <a title="{{ $user->role != 'block' ? 'حظر العضو' : 'فك الحظر' }}"
                                       href="/block_user/{{ $user->id }}"><i class="fa fa-user-times"></i></a>
                                @endif
                                <a href="{{route('users.edit',$user->username)}}"
                                   class="edit-btn-table"><i class="fa fa-pencil"></i></a>


                                <a title="حذف المستخدم " onclick="return false;" object_id="{{ $user->id }}"
                                   delete_url="/users/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                    <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('users.create')}}" class="custom_btn dark_btn">{{trans('local.add_user')}}</a>
            </div>

        </div>
    </div>
@endsection