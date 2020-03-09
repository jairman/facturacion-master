
<section class="sidebar">
 
    <div class="user-panel" style="background: white;">
        <div class="pull-left image offset-sm-3">
         <img src="{{ asset('images/logo/logo-imagen.png') }}" class="" alt="User Image">><br>
         <center><small class="pull-right" style="font-size: smaller;">Nuestros sistemas en tu negocio.</small></center>  
      </div><br> 
    </div>
 <br>
  <ul class="sidebar-menu" data-widget="tree"><br>
    <li class="header"><p>{{ Auth::user()->full_name }}</p><a href="{{ route('home') }}"style="color:#ffff;"><i class="fa fa-circle text-success"></i> Online</a></li>
     @auth
         @can('view_users')
    <li class="treeview {{ active_check(['user','login']) }}">
      <a href="#"><i class="fa fa-user"></i> <span>Usuarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        @can('view_users')
        <li class="{{ active_check(['user']) }}"><a href="{{ url('user') }}"><i class="fa fa-sort-alpha-desc"></i> Listado</a></li>
        @endcan
        @can('add_users')
        <li class="{{ active_check(['user/create']) }}"><a href="{{ url('user/create') }}"><i class="fa fa-plus-square"></i> Ingresar</a></li>
        @endcan
        @can('assign_permissions')
        <li class="{{ active_check(['permission']) }}"><a href="{{ url('permission') }}"><i class="fa fa-lock"></i> Permisos</a></li>
        @endcan
        @can('view_logins')
        <li class="{{ active_check(['logins']) }}"><a href="{{ url('logins') }}"><i class="fa fa-sign-in-alt"></i> Logins</a></li>
        @endcan
      </ul>
    </li>
    @endcan
    @can('view_productos')
    <li>
      <a href="/productos"><i class="fa fa-link"></i> <span>Inventario</span></a>
    </li>
    @endcan
    @can('view_clientes')
    <li>
      <a href="/clientes"><i class="fa fa-link"></i> <span>Clientes</span></a>
    </li>
    @endcan
    @can('view_gastos')
    <li>
      <a href="#"><i class="fa fa-link"></i> <span>Gastos</span></a>
    </li>
       @endcan
       @can('view_empleados')
    <li>
      <a href="/empleados"><i class="fa fa-link"></i> <span>Empleados</span></a>
    </li>
       @endcan
       @can('view_proveedores')
    <li>
      <a href="/proveedores"><i class="fa fa-link"></i> <span>Proveedores</span></a>
    </li>
       @endcan
     
    <li>
      <a href="/comprobantes"><i class="fa fa-link"></i> <span>Comprobantes</span></a>
    </li>
  
       @can('view_cierre_caja')
    <li>
      <a href="/cierre"><i class="fa fa-link"></i> <span>Cierre de caja</span></a>
    </li>
       @endcan
       @can('view__caja')
    <li>
      <a href="/apertura"><i class="fa fa-link"></i> <span>Apertura de caja</span></a>
    </li>
       @endcan
  </ul>
  @endauth
</section>
