@extends('layouts.adminfront')

@section('title', 'Login')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card  p-3 ">
            <center><img src="{{asset('images/logo/logo-imagen-2.png')}}" class="w3-card-4 ml-5" alt="User Image" id="imagen"></center><br><br>
             <center><h1 style="font-size: medium; font-style: inherit;" class="ml-3 mt-3 float-right">Ingresa el correo y la contraseña para iniciar sesión</h1></center><br>

                <form id="main-form" class=""><br>
                  <input type="hidden" id="_url" value="{{ url('login') }}">
                  <input type="hidden" id="_redirect" value="{{ url('') }}">
                  <input type="hidden" id="_token" value="{{ csrf_token() }}">
                    <div class="form-group row">
                       <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Correo') }}</label>
                        <div class="col-md-8  " >
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                          <span class="missing_alert text-danger" id="email_alert"></span>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-3  col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" name="password" autocomplete="current-password">

                           <span class="missing_alert text-danger" id="password_alert"></span>
                        </div>
                   </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-12 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-spinner fa-pulse"></i> {{ __('Login') }}
                            </button>

                           
                        </div>
                    </div>
                </form>
              </div>
            <div id="loader-out">
              <div id="loading-text">Cargando</div>
               <div id="loading-content"></div>
              </div>
          </div>
            </div>
          </div>
        </div>

@endsection

@push('scripts')
    <script>
      $( document ).ready(function() {
        // Handler for .ready() called.
        setTimeout(function(){
          $('#loader-out').fadeOut();
        }, 3000);
      });
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script src="{{ asset('js/admin/auth/login.js') }}"></script>
@endpush

@push('styles')
<style>
.form {
  width: 440px;
  height: 450px;

  border-radius: 200px 0px 0px 1px;
  -moz-border-radius: 200px 0px 0px 1px;
  -webkit-border-radius: 200px 0px 0px 1px;
  border: 0px solid #000000;
  -webkit-box-shadow: 6px 2px 17px 1px rgba(0,0,0,0.75);
  -moz-box-shadow: 6px 2px 17px 1px rgba(0,0,0,0.75);
  box-shadow: 6px 2px 17px 1px rgba(0,0,0,0.75);
  
  }


  #loader-out {
    background-image: url("{{asset('/images/fondo/hexagono.jpg') }}"); 
    background-attachment: fixed;
    background-position: center center;
    background-size: cover;
    position:fixed;
    width: 100%;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
  }

  #loader-container {
  position: fixed;
  width: 100%;
  height: 100%;
  }

  #loading-text {
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  color: white;
  width: 100px;
  height: 30px;
  margin: -7px 0 0 -45px;
  text-align: center;
  font-family: 'PT Sans Narrow', sans-serif;
  font-size: 20px;
}

#loading-content {
  display: block;
  position: relative;
  left: 50%;
  top: 50%;
  width: 170px;
  height: 170px;
  margin: -85px 0 0 -85px;
  border: 3px solid #F00;
}

#loading-content:after {
  content: "";
  position: absolute;
  border: 3px solid #0F0;
  left: 15px;
  right: 15px;
  top: 15px;
  bottom: 15px;
}

#loading-content:before {
  content: "";
  position: absolute;
  border: 3px solid #00F;
  left: 5px;
  right: 5px;
  top: 5px;
  bottom: 5px;
}

#loading-content {
  border: 3px solid transparent;
  border-top-color: #4D658D;
  border-bottom-color: #4D658D;
  border-radius: 50%;
  -webkit-animation: loader 2s linear infinite;
  -moz-animation: loader 2s linear infinite;
  -o-animation: loader 2s linear infinite;
  animation: loader 2s linear infinite;
}

#loading-content:before {
  border: 3px solid transparent;
  border-top-color: #D4CC6A;
  border-bottom-color: #D4CC6A;
  border-radius: 50%;
  -webkit-animation: loader 3s linear infinite;
    -moz-animation: loader 2s linear infinite;
  -o-animation: loader 2s linear infinite;
  animation: loader 3s linear infinite;
}

#loading-content:after {
  border: 3px solid transparent;
  border-top-color: #84417C;
  border-bottom-color: #84417C;
  border-radius: 50%;
  -webkit-animation: loader 1.5s linear infinite;
  animation: loader 1.5s linear infinite;
    -moz-animation: loader 2s linear infinite;
  -o-animation: loader 2s linear infinite;
}

@-webkit-keyframes loaders {
  0% {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes loader {
  0% {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

#content-wrapper {
  color: #FFF;
  position: fixed;
  left: 0;
  top: 20px;
  width: 100%;
  height: 100%;
}

#header
{
  width: 800px;
  margin: 0 auto;
  text-align: center;
  height: 100px;
  background-color: #666;
}

#content
{
  width: 800px;
  height: 1000px;
  margin: 0 auto;
  text-align: center;
  background-color: #888;
}

</style>

@endpush
