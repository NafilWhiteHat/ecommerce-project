<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>amazon</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('front_end/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('front_end/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/assets/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('front_end/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('front_end.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('front_end.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes ??? can be removed on production -->

<!-- For demo purposes ??? can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('front_end/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/jquery.rateit.min.js') }}"></script>
<script type="{{ asset('front_end/text/javascript" src="assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('front_end/assets/js/scripts.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break;
    }
    @endif
   </script>
</body>
</html>
