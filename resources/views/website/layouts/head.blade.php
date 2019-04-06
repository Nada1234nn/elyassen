<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" type="text/css"/>
<!--for arabic only-->
<link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}" type="text/css"/>
<!--end-->
<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" type="text/css"/>
<link href="{{asset('css/jPages.min.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{asset('css/animate.min.css')}}" type="text/css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" type="text/css"/>
<link rel="stylesheet" href="{{asset('css/keyframes.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css"/>

@if(session()->get('lang')=='en')

    <link rel="stylesheet" href="{{asset('css/en.css')}}" type="text/css"/>
@else
    <!--arabic-style only-->
    <link rel="stylesheet" href="{{asset('css/ar.css')}}" type="text/css"/>
    @endif
<link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css"/>