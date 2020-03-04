@section('')
    
@endsection

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href="{{ asset('css/base.css') }}" rel="stylesheet">
        <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/we.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/logo.jpg') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/vue.js') }}"></script>
        
        @if(Auth::user())
            <link href="{{ asset(Auth::user()->preferencias->estilo) }}" rel="stylesheet">
        @else
            <link href="{{ asset(config('app.style')) }}" rel="stylesheet">
        @endif
        
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>        
        @yield('scriptsHeader')
    </head>
    <body class="hold-transition login-page" id="body">
        <div id="app">
           
            @include('partials.notificaciones_box')
        <div id="wrapper" class="page-wrapper">
            @yield('content')
        </div>        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
    </body>


        <style>
    
    #body{

        background-image: url("{{asset('/img/geometrico.jpg') }}");    
        background-attachment: fixed;
        background-position: center center;
        background-size: cover;
            
    }
    
    </style>
</html>