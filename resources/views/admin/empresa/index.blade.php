@extends('layouts.admin')
@section('title', 'Empresa')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			@include('partials.mensajes');
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de los datos de la empresas</h4>
				</div>
				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-md btn-success" href="/empresa/create" class="btn btn-link">
							<i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo registro
						</a>
					</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/empresa" class="link_ruta">
								Empresa
							</a>
						</li>						
					</ul><br>
					<div class="table-responsive">

					<table id="example" cellspacing="0" width="100%" class="table table-hover">
							<thead>
							<tr>
								<th class="text-center">ID</th>	
                                <th class="text-center">Nombre</th>
								<th class="text-center">Rif</th>
								<th  class="text-center">Teléfono</th>
								<th class="text-center">Dirección</th>
								<th class="text-center">Opciones</th>
							</thead>
							<tbody>
							@foreach($empresas as $empresa)
							<tr class="text-center">
                                <td> {{ $empresa->id }} </td>		
                                <td> {{ $empresa->nombre }} </td>
                                <td> {{ $empresa->rif }} </td>
                                <td> {{ $empresa->telefono }} </td>
                                <td> {{ $empresa->direccion }} </td>
                                <td>
                                 <div class="dropdown">
				                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                       <i class="fas fa-cogs"></i>&nbsp Opciones
				                      </button>
				                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				                        <a class="dropdown-item" href="{{  url('empresa', [$empresa->id]) }}"><i class="fa fa-eye"></i> Datos de la empresa</a></li>
				                       
				                        <li><a class="dropdown-item" href="{{ url('empresa', [$empresa->id, 'edit']) }}"><i class="fa fa-edit"></i> Editar</a></li>

				                        <li><a class="dropdown-item" href="{{ url('empresa', [$empresa->id, 'imprimir']) }}"><i class="fa fa-print"></i> Imprimir</a></li>
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