@extends('layouts.admin')
@section('title', 'Pagos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Creación de pagos de empleados</h4>
				</div>

				<div class="card-body">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/pagos/empleado" class="link_ruta">
								Pagos &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/pagos/empleado/create" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
					<div class="row">
						<div class="container row">
							<div class="col-md-12 col-md-offset-0">
								<form method="post" action="{{route('empleado.store')}}">
									{{ csrf_field() }}
									<div class="form-group row">
                                     
                                    @include('admin.pagos.partials.nuevo')
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
    <script>
    $(document).ready(function (){
	var fechaEmision = new Date();
	var day = ("0" + fechaEmision.getDate()).slice(-2);
	var month = ("0" + (fechaEmision.getMonth() + 1)).slice(-2);
	fecha = fechaEmision.getFullYear()+"-"+(month)+"-"+(day);
	$("#fecha").val(fecha);
	     });
    </script>
@endpush




