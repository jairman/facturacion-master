@extends('layouts.admin')
@section('title', 'Pagos')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general del historial de pagos a los empleados</h4>
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
								Pagos
							</a>
						</li>						
					</ul><br>
					<span class="float-right">
					<a href="/pagos/empleado/create" class="btn" style="background:linear-gradient(to right,#30a0f5,#0e68ad,#004985); color: white;"> <i class="fas fa-plus-square"></i> Nuevo pago</a>	
					</span>

					<span class="float-left">
					<a href="/reportes" class="btn  mb-5" target="_blank" style="background:linear-gradient(to right,#30a0f5,#0e68ad,#004985); color: white;"> <i class="fas fa-file-pdf"></i> Reportes</a>	
					</span>
			
					<div class="table-responsive">
						<table id="example" cellspacing="0" class="table table-hover table-border">
							<thead>
							<tr>
								<th class="text-center">ID</th>	
                                <th class="text-center">Empleado</th>
                                <th class="text-center">Sueldo base</th>
								<th class="text-center">Tipo de pago</th>
                                <th  class="text-center">Modo de pago</th>
                                <th  class="text-center">Monto</th>
                                <th  class="text-center">Fecha</th>
                                <th class="text-center">Total</th>
                                <th class="text-center" colspan="3">Opciones</th>
                                
							</tr>
							</thead>
							<tbody>

							@foreach($pagos as $pago)
							<tr class="text-center">
                                <td>{{ $pago->id  }}</td>		
                                <td>{{ $pago->empleado->nb_nombre  }}  </td>
                                <td>{{ $pago->nu_sueldo_base }}</td>
                                <td>{{ $pago->tipopago->nb_tipo_pago_empleado}}</td>
                                <td>{{ $pago->modopago->nb_modo_pago}}</td>	
                                <td>{{ $pago->nu_cantidad_tipo_pago }}</td>
                                <td>{{ date('d / m / Y', strtotime($pago->fecha)) }}</td>
                                <td>{{ $pago->total }}</td>
                                <td>
                                	<div class="dropdown">
				                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                       <i class="fas fa-cogs"></i>&nbsp Opciones
				                      </button>
				                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				                        <a class="dropdown-item" href="{{  url('pagos/empleado', [$pago->id]) }}"><i class="fa fa-eye"></i> Datos del pago</a></li>
				                       
				                        <li><a class="dropdown-item" href="{{ url('pagos/empleado', [$pago->id, 'edit']) }}"><i class="fa fa-edit"></i> Editar Pago</a></li>

				                        <li><a class="dropdown-item" href="{{ url('pagos/empleado', [$pago->id, 'imprimir']) }}"><i class="fa fa-print"></i> Imprimir</a></li>
				                      </div>
				                    </div>
				                  </td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
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