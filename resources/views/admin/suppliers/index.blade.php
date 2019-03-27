@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="/dashboard"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.suppliers')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">

            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}}<span
                        class="dash-title-span">{{trans('local.suppliers')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.name_supplier')}}</th>
                        <th> {{trans('local.image_supplier')}}</th>
                        <th> {{trans('local.address')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$supplier->getUser->username}}</td>
                            <td><img src="{{asset('/uploads/'.$supplier->image)}}" class="t-pro-img" alt="img"></td>
                            <td>{{$supplier->address}}</td>
                            <td>{{$supplier->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route('suppliers.edit',$supplier->getUser->username)}}"
                                   class="edit-btn-table"><i class="fa fa-pencil"></i></a>


                                {{--<button class="edit-btn-table remove-btn sweet-2" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-2']);"><i class="fa fa-times"></i> </button>--}}
                                <a title="حذف المورد" onclick="return false;" object_id="{{ $supplier->id }}"
                                   delete_url="/suppliers/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                    <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('suppliers.create')}}" class="custom_btn dark_btn">{{trans('local.add_supplier')}}</a>
            </div>

        </div>
    </div>
@endsection
