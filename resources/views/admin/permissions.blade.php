@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href=""><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.permissions')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.permissions')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.name')}}</th>
                        <th> {{trans('local.email')}}</th>
                        <th>{{trans('local.permissions')}}
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1?>

                    @foreach($users as $user)

                        <tr>
                            <form method="post" action="{{route('permissions.store')}}">
                                @csrf
                                <input type="hidden" name="email" value="{{$user->email}}">
                                <td>{{$i++}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    {{--<div class="form-group col-md-6">--}}
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="admin"
                                               onchange="this.form.submit()" {{$user->hasRole('admin')?'checked':''}}>
                                        &nbsp
                                        <label>A</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="customer"
                                               onchange="this.form.submit()" {{$user->hasRole('customer')?'checked':''}}>
                                        &nbsp
                                        <label>c</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="suppliers"
                                               onchange="this.form.submit()" {{$user->hasRole('suppliers')?'checked':''}}>
                                        &nbsp
                                        <label>s</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="employees"
                                               onchange="this.form.submit()" {{$user->hasRole('employees')?'checked':''}}>
                                        &nbsp
                                        <label>e</label>
                                    </div>

                                    {{--</div>--}}
                                    {{----}}
                                </td>
                            </form>

                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>


        </div>
    </div>


    @endsection