@extends('layouts.admin')
@section('title', 'Proveedores')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class=" card-primary card-outline card-header">
					<h4>Alta de proveedor</h4>
				</div>

				<div class="card-body">                
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/proveedores" class="link_ruta">
								Proveedores &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/proveedores/nuevo" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
					<div class="row">
							<div class="col-md-4"><br>
								<legend>Registro de Proveedor</legend>
								<form id="form_nuevo_producto" role="form" method="POST" action="/proveedores/guardar">
									{{ csrf_field() }}
									<div class="form-group">
										<label for="txtNombre" class="control-label sr-only">Nombre</label>
										<input id="txtNombre" type="text" class="form-control" name="nombre" placeholder="Nombre del proveedor" oninvalid="this.setCustomValidity('Debe ingresar un nombre de proveedor')"  required oninput="setCustomValidity('')">
									</div>
									
									<div class="form-group">
										<label for="txtRazonSocial" class="control-label sr-only">
											Razón social
										</label>
										<input id="txtRazonSocial" type="text" class="form-control" name="razon_social" placeholder="Razón Social">
									</div>

									<div class="form-group">
										<label for="txtRif" class="control-label sr-only">
											RIF
										</label>
										<input id="txtRif" type="text" class="form-control" name="rif" placeholder="RIF"  value="{!! old('rif') !!}" >
									</div>

									<div class="form-group">
										<label for="txtTelefono" class="control-label sr-only">
											Teléfono
										</label>
										<input id="txtTelefono" type="text" class="form-control" name="telefono" placeholder="Teléfono"  value="{!! old('mail') !!}" >
									</div>
									
									<div class="form-group">
										<label for="txtMail" class="control-label sr-only">
											E-MAIL
										</label>
										<input id="txtMail" type="text" class="form-control" name="mail" placeholder="E-MAIL"  value="{!! old('mail') !!}" >
									</div>

									<div class="form-group">
										<label for="txtDireccion" class="control-label sr-only">
											Dirección
										</label>
										<input id="txtDireccion" type="text" class="form-control" name="direccion" placeholder="Direccion"  value="{!! old('direccion') !!}" >
									</div>

									<div class="form-group">
										<label for="txtSitioWeb" class="control-label sr-only">
											Sitio Web
										</label>
										<input id="txtSitioWeb" type="text" class="form-control" name="web" placeholder="Sitio web"  value="{!! old('web') !!}" >
									</div>

										<input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id}}">
									
									<div class="form-group text-center">
										<input type="submit" class="btn btn-primary btn-block" value="Guardar">
									</div>		                    		
								</form>    
							</div>
								
							<div class="col-md-6 col-md-offset-1"><br>
								<legend>Últimos proveedores registrados</legend>
								<div class="table-responsive">
									<table width="97%" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th width="50px" class="text-center">ID</th>
												<th class="text-center">Nombre</th>
												<th class="text-center">Razón Social</th>
												<th width="150px" class="text-center">Fecha</th>
											</tr>	                						
										</thead>
										<tbody>
											@foreach($proveedores->sortByDesc('created_at')->take(8) as $p)
												<tr>
													<td class="text-center">
														<a href="/proveedores/detalle/{{ $p->id}}">
															{{ $p->id}}
														</a>
													</td>
													<td>
														<a href="/proveedores/detalle/{{ $p->id}}">
															{{ $p->nombre }}
														</a>
													</td>
													<td>{{ $p->razon_social }}</td>
													@if($p->created_at != null)
														<td>{{ date_format( $p->created_at, 'd/m/Y H:i:s' ) }}</td>
													@else
														<td></td>
													@endif
												</tr>
											@endforeach
										</tbody>
									</table>
									{{ $proveedores->links( "pagination::bootstrap-4") }}
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
	$("#txtNombre").focus();

	
</script>
@endpush