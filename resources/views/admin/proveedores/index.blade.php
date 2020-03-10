@extends('layouts.admin')
@section('title', 'Proveedores')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="w3-card-4 w3-white">
                <div class="card-header">
                    <h4>Proveedores</h4>
                </div>
				<br>

                <div class="card-body">
                	<a href="/" class="btn btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver al panel</a>
                	<span class="float-right">
                		<a class="btn btn-success" href="/proveedores/nuevo" class="btn btn-link">
                        	<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Proveedor
                        </a>
                    </span><br><br><br>
                	<form id="form_busqueda" class="navbar navbar-expand-lg navbar-light bg-light" role="search">
	      		
        			<input id="txtBusqueda" type="text" class="form-control" name="busqueda" placeholder="Buscar" >
	      	
		      		<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
		    	</form>

                    </span>
                    <div class="row">
                    	<div class="card-body"><br>
	                        <div class="table-responsive">
								<table width="97%" class="table table-condensed table-striped table-hover">
									<tr>
										<th width="40px">ID</th>
										<th width="120px">Nombre</th>
										<th width="15%">RIF</th>
										<th>Dirección</th>
										<th width="15%">Telefono</th>
										<th width="15%">Mail</th>
										<th width="25px"></th>
									</tr>

									@foreach($proveedores as $proveedor)
										<tr>
											<td>
												<a href="/proveedores/detalle/{{ $proveedor->id}}">
													{{ $proveedor->id}}
												</a>
											</td>
											<td>
												<a href="/proveedores/detalle/{{ $proveedor->id}}">
													{{ $proveedor->nombre }}
												</a>
											</td>
											<td>{{ $proveedor->rif}}</td>
											<td>{{ $proveedor->direccion}}</td>
											<td>{{ $proveedor->telefono}}</td>
											<td>{{ $proveedor->mail}}</td>
											<td>
												<a href="#">
													<i class="fa fa-edit"></i>
												</a>
											</td>
										</tr>
									@endforeach							
								</table>
							</div>
							<div class="text-center">
								{{ $proveedores->links( "pagination::bootstrap-4") }}
							</div>
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
	$("#form_busqueda").show();
	$("#txtBusqueda").focus();  
</script>
@endpush