@extends('admin.layouts.layout')
@section('content_dashboard')
<div class="dash-breadcrumbes">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href=""><i class="fa fa-home"></i>الرئيسية</a>
                لوحة التحكم
            </div>
        </div>
    </div>
</div>
<!--end dash-breadcrumbes-->
<div class="container">
    <div class="row">
        <h3 class="dash-main-title text-center col-12 wow fadeIn">مرحبا بك في <span class="dash-title-span">لوحة التحكم</span></h3>
    </div>
</div>
<div class="dash-three-div margin-div2">
    <div class="container">
        <div class="row">
            <!--start dash-three-one-->
            <div class="col-lg-4 col-6 wow fadeIn">
                <div class="dash-three-one">
                    <i class="fa fa-user"></i>
                    <h3> المسجلين : <span>20</span></h3>
                </div>
            </div>
            <!--end dash-three-one-->


            <!--start dash-three-one-->
            <div class="col-lg-4 col-6 wow fadeIn">
                <div class="dash-three-one">
                    <i class="fa fa-files-o"></i>
                    <h3> ألأقسام : <span>20</span></h3>
                </div>
            </div>
            <!--end dash-three-one-->


            <!--start dash-three-one-->
            <div class="col-lg-4 col-6 wow fadeIn">
                <div class="dash-three-one">
                    <i class="fa fa-users"></i>
                    <h3> الموظفين : <span>20</span></h3>
                </div>
            </div>
            <!--end dash-three-one-->


            <!--start dash-three-one-->
            <div class="col-lg-4 col-6 wow fadeIn">
                <div class="dash-three-one">
                    <i class="fa fa-user-secret"></i>
                    <h3> المورودين : <span>20</span></h3>
                </div>
            </div>
            <!--end dash-three-one-->


            <!--start dash-three-one-->
            <div class="col-lg-4 col-6 wow fadeIn">
                <div class="dash-three-one">
                    <i class="fa fa-pagelines"></i>
                    <h3> المنتجات : <span>20</span></h3>
                </div>
            </div>
            <!--end dash-three-one-->
            <!--start dash-three-one-->
            <div class="col-lg-4 col-6 wow fadeIn">
                <div class="dash-three-one">
                    <i class="fa fa-credit-card"></i>
                    <h3> الأخبار : <span>20</span></h3>
                </div>
            </div>
            <!--end dash-three-one-->
        </div>
    </div>
</div>
<!--end dash-three-div-->
    @endsection