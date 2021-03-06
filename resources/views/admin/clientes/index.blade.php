@extends('layouts.admin')
@section('title', 'Clientes')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de clientes</h4>
				</div>
				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-md btn-success" href="/clientes/nuevo" class="btn btn-link">
							<i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo cliente
						</a>
					</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/clientes" class="link_ruta">
								Clientes
							</a>
						</li>						
					</ul><br>
					<div class="table-responsive">
						<table id="tabla_comprobantes" cellspacing="0" width="100%" class="table table-hover">
							<tr>
								<th width="100px" class="text-center" colspan="2">ID</th>	
								<th width="200px" class="text-center">Nombre</th>
								<th class="text-center">Dirección</th>
								<th width="120px" class="text-center">Teléfono</th>
								<th class="text-center">E-Mail</th>
								<th width="120px" class="text-center">Saldo</th>
							</tr>

							@foreach($clientes as $cliente)
							<tr class="text-center">
								<td>{{$cliente->id}}</td>								
								@if($cliente->empresa)
								<td>
									<i style="width: 20px;" class="fa fa-briefcase text-center" aria-hidden="true"></i>
								</td>
								<td>
									<a href="/clientes/detalle/{{$cliente->id}}">
										{{$cliente->nombre}}
									</a>
								</td>
								@else
								<td width="40px">
									<i style="width: 20px;" class="fa fa-user text-center" aria-hidden="true"></i>
								</td>
								<td>
									<a href="/clientes/detalle/{{$cliente->id}}">		
										{{$cliente->nombre}} {{$cliente->apellido}}
									</a>
								</td>
								@endif								
								<td>{{$cliente->direccion}}</td>
								<td>{{$cliente->telefono}}</td>								
								<td>{{$cliente->mail}}</td>
								<td class="text-center">
									{{ App\Models\Moneda::find(config('app.monedaPreferida'))->first()->simbolo }}
									{{ $cliente->getSaldo() }}
								</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="text-center">
						{{ $clientes->links( "pagination::bootstrap-4") }}
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