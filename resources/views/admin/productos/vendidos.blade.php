@extends('layouts.admin')
@section('title', 'productos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-heading">
					<h4>Vista general de los productos más <b>Vendidos durante el mes cursante </b></h4>
				</div>

				<div class="card-body">
					<span class="pull-right">
						<a class="btn btn-md btn-success w3-card-4" href="/productos/nuevo" class="btn btn-link" >
							<i class="fa fa-plus" aria-hidden="true"></i> Nuevo producto
						</a>
					</span>
					<br><br><br>
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
					</ul><br>
					<div class="row">
						<div class="container">
							<div class="table-responsive table-condensed">
								<table id="tabla_productos" cellspacing="0" width="97%" class="table-condensed table-striped table-bordered">
									<tr>
										<th class="text-center" width="120px">Producto</th>
										<th class="text-center" width="200px"> Cantidad</th>
										                                      
									</tr>

									@foreach($masVendidos as $producto)
										<tr>
											<td class="text-center">{{ ($producto->producto) }}</a></td>
											<td class="text-center">{{ ($producto->total_sales) }}											
											</td>
										</tr>
									@endforeach                         
								</table>
							</div>
							<div class="text-center">
								{{ $masVendidos->links( "pagination::bootstrap-4") }}
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
	$("#form_busqueda").show();
	$("#txtBusqueda").focus();  
</script>
@endpush
