<!DOCTYPE html>
<html>
  <head>
    <title>АвтоРенда (Admin) </title>
    <meta charset="utf-8">
    <link href="{{asset('admin_theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('admin_theme/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('admin_theme/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_theme/css/font-awesome.min.css')}}" rel="stylesheet" />


  	<link href="{{asset('admin_theme/css/widgets.css')}}" rel="stylesheet">
      <link href="{{asset('admin_theme/css/style.css')}}" rel="stylesheet">
      <link href="{{asset('admin_theme/css/style-responsive.css')}}" rel="stylesheet" />

   {{--   <script src="{{asset('admin_themejs/jquery-1.11.1.min.js')}}"></script>--}}
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<style>
#main-content{min-height: 550px}
}
</style>
  </head>
  <body>
  @include('admin.admin_header')


@yield('content')

      <script src="{{asset('admin_theme/js/jquery.js')}}"></script>

      <!-- bootstrap -->
      <script src="{{asset('admin_theme/js/bootstrap.min.js')}}"></script>



  <!-- nice scroll -->
  <script src="{{asset('admin_theme/js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('admin_theme/js/jquery.nicescroll.js')}}" type="text/javascript"></script>


  <!--custome script for all page-->
  <script src="{{asset('admin_theme/js/scripts.js')}}"></script>


  </body>
</html>
