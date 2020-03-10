@extends('layouts.admin')
@section('title', 'productos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-header">
					<h4>Vista general de productos</h4>
				</div>

				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-md btn-success w3-card-4" href="/productos/nuevo" class="btn btn-link" >
							<i class="fa fa-plus" aria-hidden="true"></i> Nuevo producto
						</a>
					</span>
					<span class="float-left">
						<a class="btn btn-md btn-primary w3-card-4" href="/indicadores/masVendidos/{{ $date }}" class="btn btn-link" >
							<i class="fas fa-chart-bar" aria-hidden="true"></i> Productos más vendidos
						</a>
					</span><br><br><br>
					<ul class="list-inline">
						 <li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						 <li class="list-inline-item">
							<a href="/productos" class="link_ruta">
								Productos
							</a>
						</li>
					</ul>
				
					<div class="row">
						<div class="container">
							<div class="table-responsive ">
								<table  class="table table-hover" style="width:100%">
									<thead>
									<tr>
										<th class="text-center" width="120px">Código</th>
										<th class="text-center" width="90px">Nombre</th>
										<th class="text-center" width="150px">Familia producto</th>
										<th class="text-center">Descripción</th>
										<th class="text-center" width="80px">Precio</th>
										<th class="text-center" width="10%">Stock</th> <th class="text-center" width="10%">Opciones</th>                                     
									</tr>
									</thead>

									@foreach($productos as $producto)
										
									<tbody>
<tr>
											<td class="text-center"><a href="/productos/detalle/{{ $producto->codigo}}">{{ $producto->codigo}}</a></td>
											<td class="text-center" title="{{$producto->nombre}}">
												@if(strlen($producto->nombre) > 24)
													{{ substr($producto->nombre, 0, 24) . "..."}}
												@else
													{{ $producto->nombre }}
												@endif
											</td>
											<td class="text-center">{{ $producto->familia->nombre}}</td>
											<!--<td class="text-center">{{ $producto->descripcion}}</td>-->
											<td class="text-center">
												{{ str_limit(str_replace('<br />','', $producto->descripcion), 80) }}

												@if(strlen($producto->descripcion) > 80)
												<span class="float-right">
													<a class="btn-sm btn-link" data-toggle="modal" data-target="#myModal{{ $producto->codigo }}">
														más...
													</a>
												</span>
													<div id="myModal{{ $producto->codigo }}" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">{{ $producto->nombre }}</h4>
																</div>
																<div class="modal-body">
																	{!! $producto->descripcion !!}
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
																</div>
															</div>
														</div>
													</div>
												@endif
											</td>
											<td>
												&nbsp;
												{{ App\Models\Moneda::find(config('app.monedaPreferida'))->first()->simbolo }}
												<span class="float-right">
													{{ $producto->precio}}
												</span>
											</td>
											<td class="text-center">{{ $producto->stock}}</td>
											<td class="text-center">
												<a href="#formStock" id="{{$producto->codigo}}" data-toggle="modal" data-target="#formStock" onclick='$("#form_stock").attr("action", "/productos/{{$producto->codigo}}/ModificarStock");'>
													<i class="fas fa-exchange-alt" aria-hidden="true"></i>
												</a>
											</td>
											
										</tr>
										</tbody>
									@endforeach 
									<tfoot>
							            <tr>
							                <th>Código</th>
							                <th>Nombre</th>
							                <th>Familia producto</th>
							                <th>Descripción</th>
							                <th>Precio</th>
							                <th>Stock</th>
							                <th>Opciones</th>
							            </tr>
							        </tfoot>                        
								</table>
							</div>
							<div class="text-center">
								{{ $productos->links( "pagination::bootstrap-4") }}
							</div>
						</div>
					</div>
					@include('partials.movimiento_stock')
				</div>                
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript"> 
	$(document).ready(function() {
    $('#example').DataTable();
} ); 
</script>

@endpush
