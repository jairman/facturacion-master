@extends('layouts.admin')
@section('title', 'Historial')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general del historial de las cajas</h4>
				</div>
				<div class="card-body">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/historial" class="link_ruta">
								Historial
							</a>
						</li>						
					</ul><br>
			
					<div class="table-responsive">
						<table id="example" cellspacing="0" width="100%" class="table table-hover table-border">
							<thead>
							<tr>
								<th class="text-center">ID</th>	
                                <th class="text-center">Descripcion</th>
								<th class="text-center">Vendedor(a)</th>
                                <th  class="text-center">N° Caja</th>
                                <th  class="text-center">Fecha</th>
							</tr>
							</thead>
							<tbody>

							@foreach($historiales as $historial)
							<tr class="text-center">
                                <td>{{$historial->id}}</td>		
                                <td>{{$historial->descripcion}}</td>
                                <td>{{$historial->usuario->name}}</td>
                                <td>{{$historial->caja_id}}</td>
                                <td>{{$historial->fecha}}</td>	
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