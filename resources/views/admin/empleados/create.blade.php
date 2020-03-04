@extends('layouts.admin')
@section('title', 'empleado')
@section('page_title', 'Inicio')
@section('page_subtitle', 'Principal')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="panel-heading">
					<h4>Alta de cliente</h4>
				</div>

				<div class="panel-body">
					<ul class="list-inline">
						<li>
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="/apertura" class="link_ruta">
								Apertura de caja &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="/apertura/create" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
					@include('partials.menu_productos')
					<div class="row">
						<div class="container row">
							<div class="col-md-12 col-md-offset-0">
								<legend>Datos para crear empleados</legend><br>
								<form method="post" action="{{route('empleados.store')}}">
									{{ csrf_field() }}
									<div class="form-group row">
                                     
                                        <div class="col-md-4">
                                            <label class="">Nombres</label><br>
                                            <input class="form-control" type="text"  id="nb_nombre"  name="nb_nombre" placeholder="Nombres" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de efectivo en caja.')" oninput="setCustomValidity('')">
                                        </div>
									
									<div class="col-md-4">
										<label class="">Apellidos</label><br>
                                        <input class="form-control" type="text"  id="nb_apellido"  name="nb_apellido" placeholder="Apellidos" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de efectivo en caja.')" oninput="setCustomValidity('')">
									</div>

									<div class="col-md-4">
										<label class="">Cédula</label><br>
										<input class="form-control" type="text" name="nu_cedula" id="nu_cedula" placeholder="Número de cédula" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de dinero en punto de venta.')" oninput="setCustomValidity('')">
									</div>
									<div class="col-md-4">
										<label class="">Teléfono</label><br>
										<input class="form-control" type="text" id="telefono" name="telefono" placeholder="Número de teléfono" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de efectivo en dolares que posee en caja.')" oninput="setCustomValidity('')">
									</div>
									<div class="col-md-4">
										<label class="">Profesión</label><br>
										<input class="form-control" type="text" name="nb_profesion" id="nb_profesion" placeholder="Indique la profesión del empleado" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de dinero por concepto de pago móvil.')" oninput="setCustomValidity('')">
									</div>
									
                                    <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id}}">
									<div class="col-md-4">
                                        <label class="" for="txtFecha">Fecha de ingreso</label><br>
                                        <input id="fe_ingreso" type="date" name="fe_ingreso" class="form-control input-sm" title="Fecha de ingreso">
									</div>
                                   
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

