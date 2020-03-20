@extends('layouts.admin')
@section('title', 'Tasa del día')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de la tasa del día generada</h4>
				</div>
				<div class="card-body">
					<span class="float-right">
						
					</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/tasa" class="link_ruta">
								Tasa
							</a>
						</li>						
					</ul><br>
					<div class="row">
			        <div class="col-md-6 mb-5">
			          <div class="btn-group">
			         
			            <a href="{{ url('tasa/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
			         
			          </div>
			        </div>
			      </div>
					@include('partials.mensajes')
				
					<div class="table-responsive">
						<table id="example" cellspacing="0" width="100%" class="table table-hover">
							<thead>
							<tr>
								<th class="text-center">ID</th>	
                                <th class="text-center">Tasa</th>
                                <th class="text-center">Creado</th>
                                <th class="text-center">Editado</th>
							</tr>
							</thead>
							<tbody>
							@foreach($tasas as $tasa)
							<tr class="text-center">
                                <td>{{$tasa->id}}</td>		
                                <td>{{$tasa->tasa}}</td>
                                <td>{{$tasa->created_at}}</td>
                                <td>{{$tasa->updated_at}}</td>
							</tr>
							@endforeach
							</tbody>
						</table>
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