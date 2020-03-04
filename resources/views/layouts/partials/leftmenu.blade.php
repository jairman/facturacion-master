
<section class="sidebar">
  @auth
   <a href="{{ url('/') }}" class="logo"  >
          <img src="{{ asset('images/logo/logo.png') }}" class="" alt="User Image">
         
        </a><br>
  <ul class="sidebar-menu" data-widget="tree"><br>
    <li class="header">Menu</li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Enlace</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Otro Enlace</span></a></li>
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
        <li class="{{ active_check(['logins']) }}"><a href="{{ url('logins') }}"><i class="fa fa-sign-in"></i> Logins</a></li>
        @endcan
      </ul>
    </li>
    @endcan
  </ul>
  @endauth
</section>
