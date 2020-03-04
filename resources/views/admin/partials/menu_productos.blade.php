<div class="w3-card-4">
	@include('partials.mensajes')
	<nav class="navbar navbar-default" role="navigation" >
		<!-- El logotipo y el icono que despliega el menú se agrupan
		para mostrarlos mejor en los dispositivos móviles -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
			        data-target=".navbar-ex1-collapse">
				
				<a class="navbar-brand" href="#" style="color: white;"><i class="fas fa-users"></i></a>
			</button>
		</div>						 
		<!-- Agrupar los enlaces de navegación, los formularios y cualquier
		otro elemento que se pueda ocultar al minimizar la barra -->
		<div class="collapse navbar-collapse navbar-ex1-collapse" style=" background:linear-gradient(to left,#f85032,#f6290c ,#bf1506,#8c1c14,#7d0f05,#871005);">
			<ul class="nav navbar-nav">
				<!--									
				<li><a href="#">Enlace #2</a></li>
				-->
				<li class="dropdown  dropdown-default">
					<a href="#" class="" data-toggle="dropdown" style="color:white;" style="color:white;">
						Inventario
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<!-- <li class="dropdown-header text-center">PRODUCTOS</li> -->
						<li><a href="/productos/"><i class="fa fa-table" aria-hidden="true"></i> &nbsp Vista general</a></li>
						<li><a href="/productos/nuevo"><i class="fa fa-plus-square" aria-hidden="true"></i> &nbsp  Nuevo producto</a></li>
						<li class="divider"></li>
						<li><a href="/productos/movimientos"><i class="fa fa-exchange disabled" aria-hidden="true"></i></i> &nbsp Movimientos</a></li>
						
					</ul>
	      		</li>
	      		<li class="dropdown">
					<a href="#" class="" data-toggle="dropdown" style="color:white;">
						Comprobantes
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/comprobantes/"><i class="fa fa-table" aria-hidden="true"></i> &nbsp Vista general</a></li>
						<li><a href="/comprobantes/nuevo"><i class="fa fa-plus-square" aria-hidden="true"></i> &nbsp  Nuevo comprobante</a></li>
						<li class="divider"></li>
						<li><a href="/comprobantes/reportes"><i class="fa fa-database" aria-hidden="true"></i> &nbsp  Reportes</a></li>
						<li class="divider"></li>
						<li><a href="/comprobantes/vencimientos"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp  Vencimientos</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="" data-toggle="dropdown" style="color:white;">
						Gastos
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-table" aria-hidden="true"></i> &nbsp Vista general</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="" data-toggle="dropdown" style="color:white;">
						Clientes
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">						
						<li><a href="/clientes/"><i class="fa fa-users" aria-hidden="true"></i> &nbsp Gestionar clientes</a></li>
						<li><a href="/clientes/nuevo"><i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp  Nuevo cliente</a></li>
						<li class="divider"></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="" data-toggle="dropdown" style="color:white;">
						Proveedores
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">						
						<li><a href="/proveedores"><i class="fa fa-table" aria-hidden="true"></i> &nbsp Vista general</a></li>
						<li><a href="/proveedores/nuevo"><i class="fa fa-truck" aria-hidden="true"></i> &nbsp  Nuevo proveedor</a></li>
						<li class="divider"></li>
					</ul>
				</li>
	    	</ul>						 
	    	<form id="form_busqueda" class="navbar-form navbar-right" role="search" hidden="true">
	      		<div class="form-group">
        			<input id="txtBusqueda" type="text" class="form-control" name="busqueda" placeholder="Busqueda" >
	      		</div>
	      		<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
	    	</form>						 
	  	</div>
	</nav>
</div>