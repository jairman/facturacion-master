@extends('layouts.admin')
@section('title', 'Tasa del día')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Creación de la tasa del día (dolar)</h4>
				</div>

				<div class="card-body">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/tasa" class="link_ruta">
								Tasa &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/tasa/create" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
					<div class="row">
						<div class="container row">
							<div class="col-md-12 col-md-offset-0">
								<legend>Asignación de la tasa del día</legend><br>
								<form method="post" action="{{route('tasa.store')}}">
									{{ csrf_field() }}
									<div class="form-group row">
                                     
                                        
									@include('admin.tasa.partials.datos')

									
                                   
									<div class="col-md-12"> <br>
										<button type="submit" class="btn btn-block btn-primary">Guardar</button>
									</div>
								</form>
							</div>
							
							<div class="col-md-5 col-md-offset-2">                				

                			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('partials.mensajes');
</div>
@endsection


    @push('scripts')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
@endpush

