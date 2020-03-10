
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image" style="background: white;">
        <div class="image">
         <img src="{{ asset('images/logo/logo-imagen.png') }}" class="" alt="User Image"><br>
         <center><small class="float-right" style="font-size: smaller;">Nuestros sistemas en tu negocio.</small></center>  
      </div><br> 
    </div>

    </div>
    <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
    
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-header">OPCIONES</li>
        
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
                Administración
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
        
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{url('user')}}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>Usuarios</p>
              </a>
            </li>
        
            <li class="nav-item">
                <a href="{{url('postulados')}}" class="nav-link">
                <i class="far fa-file-archive nav-icon"></i>
                <p>Postulados</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{url('periodo')}}" class="nav-link">
                <i class="fas fa-calendar-alt nav-icon"></i>
                <p>Periodo</p>
                </a>
            </li>
            </ul>
        </li>
        <div class=" mt-3 pb-3 mb-3 ">
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                  Administración
                  <i class="right fas fa-angle-left"></i>
              </p>
              </a>
          
              <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{url('user')}}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
          
              <li class="nav-item">
                  <a href="{{url('postulados')}}" class="nav-link">
                  <i class="far fa-file-archive nav-icon"></i>
                  <p>Postulados</p>
                  </a>
              </li>
              
              <li class="nav-item">
                  <a href="{{url('periodo')}}" class="nav-link">
                  <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>Periodo</p>
                  </a>
              </li>
              </ul>
          </li>
        </div>
        </li>
        </ul>
    </nav>

    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->