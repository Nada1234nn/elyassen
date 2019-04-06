@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="/dashboard"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.systems')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.systems')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.name_system')}}</th>
                        <th> {{trans('local.enname_system')}}</th>
                        <th> {{trans('local.system_follow')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($systems as $system)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$system->name}}</td>
                            <td>{{$system->en_name}}</td>
                            <td>{{$system->role_id==$role_s->id?$role_s->name:''}}{{$system->role_id==$role_e->id?$role_e->name:''}}</td>
                            <td>{{$system->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route('systems.edit',$system->name)}}"
                                   class="edit-btn-table"><i class="fa fa-pencil"></i></a>


                                {{--<button class="edit-btn-table remove-btn sweet-2" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-2']);"><i class="fa fa-times"></i> </button>--}}
                                <a title="حذف النظام" onclick="return false;" object_id="{{ $system->id }}"
                                   delete_url="/systems/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                    <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('systems.create')}}" class="custom_btn dark_btn">{{trans('local.add_system')}}</a>
            </div>

        </div>
    </div>
@endsection