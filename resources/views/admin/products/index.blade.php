@extends('admin.layouts.layout')
@section('content_dashboard')
    <div class="dash-breadcrumbes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>{{trans('local.index')}}</a>
                    {{trans('local.products')}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.alert')

    <!--end dash-breadcrumbes-->
    <div class="container">
        <div class="row">
            <h3 class="dash-main-title text-center col-12 wow fadeIn">{{trans('local.hello_in')}} <span
                        class="dash-title-span">{{trans('local.products')}}</span></h3>

            <div class="category-table wow fadeIn col-12">
                <table id="example" class="table datatable-save-state table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#{{trans('local.ID')}}</th>
                        <th>{{trans('local.name')}}</th>
                        <th>{{trans('local.section')}}</th>
                        <th>{{trans('local.name_supplier')}}</th>
                        <th>{{trans('local.distinctive')}}</th>
                        <th>{{trans('local.date_created')}} </th>
                        <th> {{trans('local.action_taken')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>

                    @foreach($products as $product)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><img src="{{asset('uploads/'.$product->image)}}" class="t-pro-img"
                                     alt="img"/> {{$product->name}} ({{$product->en_name}})
                            </td>
                            <td>{{$product->getCategories->name}}</td>
                            <td> {{$product->getSupplier->getUser->username}}</td>
                            <td>{{$product->sorting==1?trans('local.discrimintation_pro_1'):trans('local.discrimintation_pro_2')}}</td>
                            <td>{{$product->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route('products.edit',$product->name)}}" class="edit-btn-table"><i
                                            class="fa fa-pencil"></i></a>
                                <a title="حذف المنتج" onclick="return false;" object_id="{{ $product->id }}"
                                   delete_url="/products/" class="edit-btn-table remove-btn sweet_warning" href="#">
                                    <i class="fa fa-times"></i></a>

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-12 left-btn">
                <a href="{{route('products.create')}}" class="custom_btn dark_btn">{{trans('local.add_product')}}</a>
            </div>


        </div>
    </div>
@endsection