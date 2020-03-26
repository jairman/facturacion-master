@extends('layouts.admin')
@section('title', 'Apertura de caja')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Opciones para generar el reporte de los recibos cancelados</h4>
				</div>
				<div class="card-body">
					<br>
					
					<form method="post" action="/reportes/imprimir">
									{{ csrf_field() }}
	
					<div class="col-md-4">
						 <label class="">Tipo de reporte</label><br>
						    <select name="tipo_reporte" class="form-control input-sm">
							  <option value="0" selected="true">Seleccione</option>
							  <option value="1">General</option>
							  <option value="2">Por empleado</option>
						</select>

						<label class="">Empleados</label><br>
						<select name="empleado_id" class="form-control input-sm">
							  <option value="0" selected="true">Seleccione</option>
							  @foreach($empleados as $empleado)
								<option value="{{$empleado->id_empleado}}">{{$empleado->nb_nombre}}</option>
						       @endforeach
						</select>
						</div>	
						<div class="col-md-12"> <br>
					                  <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-search"></i>Buscar</button>
					                </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@include('partials.mensajes');
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

    var table = $('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
            }
        },
    });
    } );
        </script>
@endpush