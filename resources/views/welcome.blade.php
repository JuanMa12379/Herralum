<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vitrelum Herrajes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{url('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('front/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{asset('front/vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{asset('front/vendor/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('front/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="{{asset('front/img/favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('front/img/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('front/img/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('front/img/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('front/img/apple-touch-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('front/img/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('front/img/apple-touch-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('front/img/apple-touch-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('front/img/apple-touch-icon-152x152.png')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div id="all">

      <!-- Top bar end-->


      <!-- Navbar Start-->
      @include('front.header')
      <!-- Navbar End-->
      
      @yield('content')

      

      <!-- FOOTER -->
      @include('front.footer')
    </div>
    <!-- Javascript files-->
    <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('front/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('front/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('front/vendor/waypoints/lib/jquery.waypoints.min.js')}}"> </script>
    <script src="{{asset('front/vendor/jquery.counterup/jquery.counterup.min.js')}}"> </script>
    <script src="{{asset('front/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset('front/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('front/vendor/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('front/js/front.js')}}"></script>
    <script src="{{asset('front/js/carrousel.js')}}"></script>
    <script src="{{asset('front/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
      @yield('scripts')
    
  </body>
</html>