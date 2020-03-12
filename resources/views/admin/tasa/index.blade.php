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
						<table id="tabla_comprobantes" cellspacing="0" width="100%" class="table table-hover">
							<tr>
								<th class="text-center">ID</th>	
                                <th class="text-center">Tasa</th>
                                <th class="text-center">Creado</th>
                                <th class="text-center">Editado</th>
                                <th  class="text-center "></th>
							</tr>

							@foreach($tasas as $tasa)
							<tr class="text-center">
                                <td>{{$tasa->id}}</td>		
                                <td>{{$tasa->tasa}}</td>
                                <td>{{$tasa->created_at}}</td>
                                <td>{{$tasa->updated_at}}</td>
                                <td>
			                    <a class="" href="{{ url('tasa', [$tasa->id, 'edit']) }}"><i class="fa fa-edit"></i> Editar</a>
			                  </td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="text-center">
						{{ $tasas->links( "pagination::bootstrap-4") }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$("#form_busqueda").show();
			$("#txtBusqueda").focus();		
		});
	</script>
@endsection