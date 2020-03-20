@extends('layouts.admin')
@section('title', 'Cierre de caja')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de la cierre de caja</h4>
				</div>
				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-md btn-success" href="/cierre/create" class="btn btn-link">
							<i class="fa fa-user-plus" aria-hidden="true"></i> Nueva cierre
						</a>
					</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/cierre" class="link_ruta">
								cierre
							</a>
						</li>						
					</ul><br>
					
				
					<div class="table-responsive">
						<table id="tabla_comprobantes" cellspacing="0" width="100%" class="table table-hover">
							<tr>
								<th class="text-center">ID</th>	
                                <th class="text-center">Efectivo</th>
								<th class="text-center">Punto de venta</th>
								<th  class="text-center">Dólares</th>
								<th class="text-center">Transferencia</th>
                                <th  class="text-center">Pago móvil</th>
                                <th  class="text-center">Estado de caja</th>
                                <th  class="text-center">N° Caja</th>
							</tr>

							@foreach($cierres as $cierre)
							<tr class="text-center">
                                <td>{{$cierre->id_cierre}}</td>		
                                <td>{{$cierre->nu_cantidad_efectivo}}</td>
                                <td>{{$cierre->nu_cantidad_punto_venta}}</td>
                                <td>{{$cierre->nu_cantidad_dolares}}</td>
                                <td>{{$cierre->nu_cantidad_transferencias}}</td>
                                <td>{{$cierre->nu_cantidad_pago_movil}}</td>
                                <td><span class="badge {{ $cierre->status ? 'bg-green' : 'bg-red' }}">{{ $cierre->display_status }}</span></td>						
								<td>{{$cierre->caja_id}}</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="text-center">
						{{ $cierres->links( "pagination::bootstrap-4") }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

    var table = $('#').DataTable({
example    language: {
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