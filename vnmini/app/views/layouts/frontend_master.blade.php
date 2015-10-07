<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!-- <meta charset="utf-8"> -->
        <!-- <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <title>{{ $info->name }}</title>
        <link rel="shortcut icon" href="img/logo_short.png" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="{{ $des->description }}">
        <meta name="keyword" content="{{ $des->keyword }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- slick Css -->
        <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css"/>
        <!-- Site CSS -->
        <link rel="stylesheet" href="{{ asset('stylesheets/style.css') }}">
        @yield('css')
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
         <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places" style=""></script>
    </head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=1609703232582143";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@include('layouts.frontend_header')
<!-- .header -->

@yield('banner')
<!-- .slide-top -->


@include('layouts.frontend_service')

<!-- .services -->

@yield('content')
<!-- .main-content -->
<a href="#0" class="cd-top"><i class="fa fa-chevron-up"></i></a>
@include('layouts.frontend_partner')
<!-- .partner -->


@include('layouts.frontend_footer')
<!-- .bottom -->

</body>
    <!-- include jQuery -->
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>
                
   <script type="text/javascript" src="{{ asset('script/script.js') }}"></script>
   
   @yield('script')
</html>