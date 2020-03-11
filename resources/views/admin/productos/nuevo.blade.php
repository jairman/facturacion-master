@extends('layouts.admin')
@section('title', 'productos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-header">
					<h4>Alta de producto</h4>
				</div>

				<div class="card-body">                
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/productos" class="link_ruta">
								Productos &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/productos/nuevo" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
				
					<div class="row">
						
							<div class="col-md-4">
								<legend>Registro de producto</legend>
								<form id="form_nuevo_producto" role="form" method="POST" action="/productos/nuevo">
									{{ csrf_field() }}
									<div class="form-group">
										<label for="txtCodigo" class="control-label ">Código</label>
										<input id="txtCodigo" type="text" class="form-control" name="codigo" placeholder="Código de producto"  value="{!! old('codigo') !!}" oninvalid="this.setCustomValidity('Debe ingresar un código para registrar el producto')" required oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label for="txtNombre" class="control-label ">Nombre</label>
										<input id="txtNombre" type="text" class="form-control" name="nombre" placeholder="Nombre de producto" oninvalid="this.setCustomValidity('Debe ingresar un nombre de producto')"  required oninput="setCustomValidity('')">
									</div>
									
									<div class="form-group">
										<label for="txtCodigoDeBarras" class="control-label ">
											Código de barras
										</label>
										<input id="txtCodigoDeBarras" type="text" class="form-control" name="codigo_de_barras" placeholder="Código de barras"  value="{!! old('codigo_de_barras') !!}" >
									</div>
									
									<div class="form-group">
										<label for="txtNombre" class="control-label sr-only ">
											Familia de producto
											<a href="#formFamiliaProducto" class="btn-link" data-toggle="modal" data-target="#formFamiliaProducto" style="color:green">
												<small>
													<i class="fa fa-plus" aria-hidden="true">
														Agregar
													</i>
												</small>
											</a>
										</label>

										<div class="input-group pull-right">
											<select id="selectFamiliaProducto" class="form-control" name="familia_producto" required="true">
												<option value="" disabled selected hidden>Familia de producto</option>
												@foreach( $familias_producto as $f)
													<option value="{{ $f->id}}">{{ $f->nombre }}</option>
												@endforeach
											</select>
											
											<div class="input-group-btn">
												<a href="#formFamiliaProducto" id="btnAgregarArticulo" class="btn btn-default" data-toggle="modal" data-target="#formFamiliaProducto" style="color:green">
													<i class="fa fa-plus-square" aria-hidden="true"></i>
												</a>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="txtPrecio" class="control-label ">Cotización</label>
										<input id="cotizacion" name="cotizacion" class="form-control" name="precio" placeholder="Cotización del dólar">
									</div>
									<div class="form-group">
										<label for="txtPrecio" class="control-label ">Precio de compra</label>
										<input id="preciocompra" name="preciocompra" class="form-control" name="precio" placeholder="Precio de compra del producto">
									</div>
									<div class="form-group">
										<label for="txtPrecio" class="control-label ">Precio de venta</label>
										<input id="txtPrecio" class="form-control" name="precio" placeholder="Precio en {{ $moneda->simbolo }}">
									</div>

									
									<div class="form-group">										
										<label for="txtStock" class="control-label ">Cantidad inicial</label>
										<input id="txtStock" type="number" class="form-control" name="stock" placeholder="Stock inicial del producto">
									</div>
									<div class="form-group" style="">
										<label for="txtDescripcion" class="control-label ">Descripción</label>
										<textarea class="form-control" id="txtDescripcion" rows="3" placeholder="Descripción del producto" name="descripcion"></textarea>
									</div>

									

									<div class="form-group text-center">
										<input type="submit" class="btn btn-primary btn-block" value="Guardar">
									</div>		                    		
								</form>   

							</div>
		
							<div class="col-md-6 col-md-offset-1">
								<legend>Últimos productos registrados</legend>
								<div class="table-responsive">
									<table width="97%" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Código</th>
												<th>Nombre</th>
												<th>Fecha</th>
											</tr>	                						
										</thead>
										<tbody>
											@foreach($productos->sortByDesc('id')->take(8) as $p)
												<tr>
													<td><a href="/productos/detalle/{{ $p->codigo}}">{{ $p->codigo}}</a></td>
													<td>{{ $p->nombre }}</td>
													@if($p->created_at != null)
														<td>{{ date_format( $p->created_at, 'd/m/Y H:i:s' ) }}</td>
													@else
														<td></td>
													@endif
												</tr>
											@endforeach
										</tbody>

									</table>
									{{ $productos->links( "pagination::bootstrap-4") }}
								</div>
							</div>
							<div class="col-md-5 col-md-offset-2">                					
								
							</div>
							@include('partials.familia_producto_box')
						</div>
					</div>                        
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">	
	//Auto focus al buscador
	$("#txtCodigo").focus();
	$("#form_nuevo_producto").on('submit', function(e){		
		var precio = $("#txtPrecio").val();
		precio = precio.replace(",", ".");		
		if(isNaN(precio)) {			
			e.preventDefault();
			alert("El precio ingresado no es válido.");
		}
	});

	$("#formFamiliaProducto").on('submit', function(e){
		e.preventDefault();		
		var familiaProducto = $('#txtnombreFamiliaProducto').val();
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: "POST",
			url: '/productos/familiaProductos/nueva',
			data: {nombreFamiliaProducto: familiaProducto},            
			success: function( response ) {				
				$('#selectFamiliaProducto').append($('<option>', {
					value: response,
					text: familiaProducto,
					selected: true
				}));
				$('#formFamiliaProducto').modal('toggle');
			}
		});
	});
</script>

@endpush