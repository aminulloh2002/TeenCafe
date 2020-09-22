<!DOCTYPE html>
<html>

<!-- Mirrored from demo.vueadmin-front-endtemplate.com/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jul 2020 11:41:26 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <title>Clear admin Template | Clear admin-front-end Template </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="admin-front-end/img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script src="{{asset('https://oss.maxcdn.com/libs/respond.js')}}/1.3.0/respond.min.js')}}"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" rel="stylesheet" href="{{asset('admin-front-end/css/app.css')}}"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="{{asset('admin-front-end/vendors/swiper/css/swiper.min.css')}}">
    <link href="{{asset('admin-front-end/vendors/nvd3/css/nv.d3.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('admin-front-end/vendors/lcswitch/css/lc_switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-front-end/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-front-end/css/custom_css/widgets.css')}}">
    <link href="{{asset('admin-front-end/css/custom_css/dashboard1.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-front-end/css/custom_css/dashboard1_timeline.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin-front-end/vendors/animate/animate.min.css')}}">

    <!--end of page level css-->
</head>
<body class="skin-default">
@include('admin.layout.header')
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layout.sidebar')
    <aside class="right-side">

        
        <section class="content">
            @yield('content')
            <!-- /#right -->
            <div class="background-overlay"></div>
        </section>
        <!-- /.content --> </aside>
    <!-- /.right-side --> </div>
<!-- ./wrapper -->
<!-- global js -->
<div id="qn"></div>

<script src="{{asset('admin-front-end/js/app.js')}}" type="text/javascript"></script>
<!-- end of global js -->

<!-- begining of page level js -->
<!--Sparkline Chart-->
<!-- flip --->
<script type="text/javascript" src="{{asset('admin-front-end/vendors/flip/js/jquery.flip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-front-end/vendors/lcswitch/js/lc_switch.min.js')}}"></script>
<!--swiper-->
<script type="text/javascript" src="{{asset('admin-front-end/vendors/swiper/js/swiper.min.js')}}"></script>

</body>


<!-- Mirrored from demo.vueadmin-front-endtemplate.com/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jul 2020 11:42:39 GMT -->
</html>