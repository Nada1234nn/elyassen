<!DOCTYPE html>
<!--
  To change this license header, choose License Headers in Project Properties.
  To change this template file, choose Tools | Templates

  and open the template in the editor.
-->
<html>
<head>
    <title>elyassen</title>
    <!--
      Meta tags
      ================
    -->
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}" />

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!--
      Style sheet
      ================
    -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css" />
    <!--for arabic only-->
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}" type="text/css" />
    <!--end-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" type="text/css" />
    <link href="{{asset('css/jPages.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/keyframes.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/intlTelInput.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    @if(session()->get('lang')=='en')

    <link rel="stylesheet" href="{{asset('css/en.css')}}" type="text/css" />
    @else
    <!--arabic-style only-->
    <link rel="stylesheet" href="{{asset('css/ar.css')}}" type="text/css" />
    @endif
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css" />


    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" type="text/css" />--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}" type="text/css"/>
    {{--    <link rel="stylesheet" href="{{asset('admin/bootstrap.css')}}" type="text/css" />--}}
    {{--<link rel="stylesheet" href="{{asset('admin/components.css')}}" type="text/css" />--}}

</head>

<body>

<!--start pages-sec
          ================-->
<section class="dash-sec">
@include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    <!--start left-tabs-grid-->
        <div class="dash-left-tabs">

@yield('content_dashboard')

        </div>
        <!--end left-tabs-grid-->

</section>

<!--start copyrights
             ================-->
<div class="copyrights dash-copyrights">
    <div class="container">
        <div class="row">
            <div class="col-9 copy-right wow fadeIn">
                جميع الحقوق محفوظة لدى الياسين © 2019
            </div>

            <div class="col-3 copy-left wow fadeIn">
                <a href="https://jaadara.com/"> <img src="{{asset('images/main/gdara.png')}}" alt="img"> </a>
            </div>
        </div>
    </div>
</div>
<!--end copyrights-->




<!--Scripts
                 ================-->
<script type="text/javascript" src="{{asset('js/html5shiv.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/respond.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jPages.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/snake.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/html5lightbox.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/custom-sweetalert.js')}}"></script>
<script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
<script src="{{asset('js/read_image.js')}}"></script>
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
<script src="{{asset('js/categoryattribute.js')}}" type="text/javascript"></script>

<script>

    $(document).ready(function() {
        $('#ex').DataTable();
    } );
</script>
</body>

</html>
