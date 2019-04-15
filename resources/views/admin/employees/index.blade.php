@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.employees')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.employees')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.employee_username')}}</th>
                        <th> {{trans('local.about_image')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$employee->getUser->username}}</td>
                            <td><img src="{{asset('/uploads/'.$employee->image)}}" class="t-pro-img" alt="img"></td>
                            <td>{{$employee->created_at->format("d/m/Y")}}</td>
                            <td>

                                {{--<a href="/follow_work/{{ $employee ->id }}">--}}
                                {{--<button type="button" name="button" class="btn--}}
                                {{--{{ $object->block == 1 ? 'btn-success' : 'btn-danger' }}--}}
                                {{--">--}}
                                {{--                                        {{ $object->block == 1 ? 'فك الحظر' : 'حظر العضو' }}--}}
                                {{--</button>--}}
                                {{--</a>--}}

                                <a href="{{route('follow_work',$employee ->id)}}" class="dark_btn custom_btn no-mar-btn"
                                   style="{{$employee->getUser->hasRole('efollow_work')?'color: red;':''}}">{{$employee->getUser->hasRole('efollow_work')?trans('local.efollowing_work'):trans('local.follow_works')}}</a>
                                <a href="{{route('control_supplier',$employee ->id)}}"
                                   class="dark_btn custom_btn no-mar-btn"
                                   style="{{$employee->getUser->hasRole('econtrol_suppliers')?'color: red;':''}}">{{$employee->getUser->hasRole('econtrol_suppliers')?trans('local.econtrol_suppliers'):trans('local.control_supplier')}}</a>
                                <a href="{{route('receive_ordersPro',$employee ->id)}}"
                                   class="dark_btn custom_btn no-mar-btn"
                                   style="{{$employee->getUser->hasRole('eproduct_orders')?'color: red;':''}}">{{$employee->getUser->hasRole('eproduct_orders')?trans('local.receive_ordersProduct'):trans('local.receive_ordersPro')}}</a>

                                <a href="{{route('employees.edit',$employee->getUser->username)}}"
                                   class="edit-btn-table"><i class="fa fa-pencil"></i></a>


                                {{--<button class="edit-btn-table remove-btn sweet-2" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-2']);"><i class="fa fa-times"></i> </button>--}}
                                <a title="حذف العضو" onclick="return false;" object_id="{{ $employee->id }}"
                                   delete_url="/employees/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                    <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('employees.create')}}" class="custom_btn dark_btn">{{trans('local.add_employee')}}</a>
            </div>

        </div>
    </div>
@endsection
