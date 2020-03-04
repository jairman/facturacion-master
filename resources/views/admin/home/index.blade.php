@extends('layouts.admin')

@section('title', 'Inicio')
@section('page_title', 'Inicio')
@section('page_subtitle', 'Principal')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
    <li class="active">Panel de control</li>
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="panel-heading">
					<h4 class="">Panel de control</h4> 
				
					<div class="panel-body">					
						<div class="row">
							
							<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Inventario de productos</h3></center><br>

									<ul class="list-group"> 
									@can('view_productos')                               
										<a href="/productos" class="list-group-item">
											Vista general 
											<span class="pull-right">
												<i class="fa fa-table" aria-hidden="true"></i>
											</span>
										</a
										>
									@endcan

									@can('add_productos')
										<a href="/productos/nuevo" class="list-group-item">
											Nuevo producto
											<span class="pull-right">
												<i class="fa fa-plus-square" aria-hidden="true"></i>
											</span>
										</a>
										@endcan

										@can('view_productos')
										<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
											Reportes
											<span class="pull-right">
												<i class="fa fa-database" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_movimientos')
										<a href="/productos/movimientos" class="list-group-item">
											Movimientos
											<span class="pull-right">
												<i class="fas fa-exchange-alt" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
									</ul>
								</div>
							</div>
						
							<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Comprobantes</h3></center><br>
									<ul class="list-group">
										@can('view_facturas')
										<a href="/comprobantes/" class="list-group-item">
											Vista general
											<span class="pull-right">
												<i class="fa fa-table" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('add_facturas')
										<a href="/comprobantes/nuevo" class="list-group-item">
											Nuevo comprobante
											<span class="pull-right">
												<i class="fa fa-plus-square" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_facturas')
										<a href="/comprobantes/reportes" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
											Reportes
											<span class="pull-right">
												<i class="fa fa-database" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_facturas')
										<a href="/comprobantes/vencimientos" class="list-group-item">
											Vencimientos
											<span class="pull-right">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Gastos</h3></center><br>
									<ul class="list-group"> 
									@can('view_gastos')                               
										<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
											Vista General
											<span class="pull-right">
												<i class="fa fa-table" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('add_gastos')
										<a href="/gastos/nuevo" class="list-group-item">
											Nuevo gasto o compra
											<span class="pull-right">
												<i class="fa fa-plus-square" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_gastos')
										<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
											Reportes
											<span class="pull-right">
												<i class="fa fa-database" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_gastos')
										<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
											Conceptos
											<span class="pull-right">
												<i class="fa fa-book" aria-hidden="true"></i>
											</span>
										</a>
										@else
										<center><h5 style="color: red;">Lo siento, usted no tiene permisos para ver este módulo.</h5></center><br>
										@endcan
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Clientes</h3></center><br>
									<ul class="list-group">
									@can('view_clientes')                                
										<a href="/clientes" class="list-group-item" >
											Vista general
											<span class="pull-right">
												<i class="fa fa-table" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('add_clientes') 
										<a href="/clientes/nuevo" class="list-group-item">
											Nuevo cliente
											<span class="pull-right">
												<i class="fa fa-plus-square" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_clientes') 
										<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
											Reportes
											<span class="pull-right">
												<i class="fa fa-database" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Proveedores</h3></center><br>
									<ul class="list-group">
										@can('view_proveedores') 
										<a href="/proveedores" class="list-group-item" >
											Vista general
											<span class="pull-right">
												<i class="fa fa-table" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('add_proveedores')
										<a href="/proveedores/nuevo" class="list-group-item">
											Nuevo proveedor
											<span class="pull-right">
												<i class="fa fa-plus-square" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_proveedores')
										<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
											Reportes
											<span class="pull-right">
												<i class="fa fa-database" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Empleados</h3></center><br>
									<ul class="list-group">
										@can('view_empleados')
										<a href="/empleados" class="list-group-item" >
											Vista general
											<span class="pull-right">
												<i class="fa fa-table" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_empleados')
										<a href="/empleados/create" class="list-group-item">
											Nuevo empleado
											<span class="pull-right">
												<i class="fa fa-plus-square" aria-hidden="true"></i>
											</span>
										</a>
										@endcan
										@can('view_empleados')
										<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
											Reportes
											<span class="pull-right">
												<i class="fa fa-database" aria-hidden="true"></i>
											</span>
										</a>
										@else
										<center><h5 style="color: red;">Lo siento, usted no tiene permisos para ver este módulo</h5></center><br>
										@endcan
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Apertura de caja</h3></center><br>
								<ul class="list-group"> 
								      @can('view_apertura_caja')                         
									<a href="/apertura" class="list-group-item" >
										Vista general
										<span class="pull-right">
											<i class="fa fa-table" aria-hidden="true"></i>
										</span>
									</a>

									@endcan
									@can('add_apertura_caja') 
									<a href="/apertura/create" class="list-group-item">
										Nueva apertura
										<span class="pull-right">
											<i class="fa fa-plus-square" aria-hidden="true"></i>
										</span>
									</a>

									@endcan
									@can('view_apertura_caja') 
									<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
										Reportes
										<span class="pull-right">
											<i class="fa fa-database" aria-hidden="true"></i>
										</span>
									</a>

									@endcan
								</ul>
							</div>
						</div>
						<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Cierre de caja</h3></center><br>
								<ul class="list-group"> 
								      @can('view_cierre_caja')                         
									<a href="/cierre" class="list-group-item" >
										Vista general
										<span class="pull-right">
											<i class="fa fa-table" aria-hidden="true"></i>
										</span>
									</a>

									@endcan
									@can('add_cierre_caja') 
									<a href="/cierre/create" class="list-group-item">
										Nuevo cierre
										<span class="pull-right">
											<i class="fa fa-plus-square" aria-hidden="true"></i>
										</span>
									</a>

									@endcan
									@can('view_cierre_caja') 
									<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
										Reportes
										<span class="pull-right">
											<i class="fa fa-database" aria-hidden="true"></i>
										</span>
									</a>

									@endcan
								</ul>
							</div>
						</div>
						<div class="col-md-4">
								<div class="w3-card-4 w3-white"><br>
									<center><h3>Usuarios</h3></center><br>
								<ul class="list-group"> 
								      @can('view_users')                         
									<a href="/user" class="list-group-item" >
										Vista general
										<span class="pull-right">
											<i class="fa fa-table" aria-hidden="true"></i>
										</span>
									</a>

									@endcan
									@can('add_users') 
									<a href="/user/create" class="list-group-item">
										Nuevo usuario
										<span class="pull-right">
											<i class="fa fa-plus-square" aria-hidden="true"></i>
										</span>
									</a>

									@endcan
									@can('view_users') 
									<a href="#" class="list-group-item" data-toggle="popover" data-content="Próximamente" data-trigger="hover" >
										Reportes
										<span class="pull-right">
											<i class="fa fa-database" aria-hidden="true"></i>
										</span>
									</a>
										@else
										<center><h5 style="color: red;">Lo siento, usted no tiene permisos para ver este módulo</h5></center><br>
									@endcan
								</ul>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>

@endsection
