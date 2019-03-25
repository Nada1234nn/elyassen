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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!--
      Style sheet
      ================
    -->


    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <!--for arabic only-->
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css" type="text/css" />
    <!--end-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css" />
    <link href="css/jPages.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="css/keyframes.css" type="text/css" />
    <link rel="stylesheet" href="css/header.css" type="text/css" />
    <link rel="stylesheet" href="css/footer.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!--arabic-style only-->
    <link rel="stylesheet" href="css/ar.css" type="text/css" />
    <!--english-style only<link rel="stylesheet" href="css/en.css" type="text/css" />--end-->
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" type="text/css" />

</head>

<body>

<!--start pages-sec
          ================-->
<section class="dash-sec">

    @include('admin.layouts.sidebar')

    <!--start left-tabs-grid-->
        <div class="dash-left-tabs">
            @include('admin.layouts.header')

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
                <a href="https://jaadara.com/"> <img src="images/main/gdara.png" alt="img"> </a>
            </div>
        </div>
    </div>
</div>
<!--end copyrights-->




<!--Scripts
                 ================-->

<script type="text/javascript" src="js/html5shiv.min.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/wow.min.js" type="text/javascript"></script>
<script src="js/jPages.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/html5lightbox.js"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#ex').DataTable();
    } );
</script>
</body>

</html>
