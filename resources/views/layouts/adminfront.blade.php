<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturación - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/logo/logo-imagen.png') }}">
    <link rel="stylesheet" href="{{ asset('css/we.css') }}">
    @stack('styles')
  </head>

  <body class="hold-transition login-page" id="login">
    <!--Page Content Here -->
    @yield('content')

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pace.js') }}"></script>
    @stack('scripts')



  <style>
    
    #login{
      
      background-attachment: fixed;
      background-position: center center;
      background-size: cover;
       background-image: url("{{asset('/images/fondo/hexagono.jpg') }}");    
            
    }
    
    </style>


  </body>
</html>
