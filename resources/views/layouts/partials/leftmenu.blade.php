
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <a href="{{ route('home') }}"> <div class="image" style="background: white;">
        <div class="image">
        <img src="{{ asset('images/logo/logo-imagen.png') }}" class="" alt="User Image"><br>
         </a>
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
            <a href="{{url('permission')}}" class="nav-link">
              <i class="far fa-file-archive nav-icon"></i>
              <p>Permisos</p>
            </a>
          </
           <li class="nav-item">
            <a href="{{url('logins')}}" class="nav-link">
              <i class="fas fa-id-card-alt nav-icon"></i>
              <p>Logins</p>
            </a>
          </
        </ul>
      </li>
        <div class=" mt-3 pb-3 mb-3 ">
              <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                  Opciones del sistema
                  <i class="right fas fa-angle-left"></i>
              </p>
              </a>
          
          <ul class="nav nav-treeview">    
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Inventario
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                 <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/productos/nuevo" class="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                  <p>Agregar producto</p>
                </a>
              </li>
                      <li class="nav-item">
                <a href="/productos" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                            <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/productos/movimientos" class="nav-link">
                      <i class="fas fa-people-carry nav-icon"></i>
                      <p>Ver movimiento</p>
                    </a>
                  </li>
   
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-file-pdf nav-icon"></i>
                      <p>Generar reportes</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Comprobantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                 <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/comprobantes" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                        <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/comprobantes/nuevo" class="nav-link">
                      <i class="fas fa-cart-plus nav-icon"></i>
                      <p>&nbsp Comprobante nuevo</p>
                    </a>
                  </li>
   
                  <li class="nav-item">
                    <a href="/comprobantes/imprimir" class="nav-link">
                      <i class="fas fa-file-pdf nav-icon"></i>
                      <p>&nbsp Reportes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/comprobantes/vencimientos" class="nav-link">
                      <i class="fas fa-id-badge nav-icon"></i>
                      <p>&nbsp  Vencimientos</p>
                    </a>
                  </li>
                </ul>
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Gastos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
            </ul>
          </
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                 <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/clientes" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                        <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="clientes/nuevo" class="nav-link">
                      <i class="fas fa-user-plus nav-icon"></i>
                      <p>&nbsp Nuevo cliente</p>
                    </a>
                  </li>
                </ul>
 
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shipping-fast"></i>
              <p>
                Proveedores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                    <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proveedores" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                           <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/proveedores/nuevo" class="nav-link">
                      <i class="fab fa-opencart nav-icon"></i>
                      <p>&nbsp Proveedor nuevo</p>
                    </a>
                  </li>
                </ul>
 
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-business-time"></i>
              <p>
                Empleados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                  <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/empleados" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                         <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="empleados/create" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>&nbsp Empleado nuevo</p>
                    </a>
                  </li>
                </ul>
 
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Apertura de caja
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                      <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/apertura" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                             <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/apertura/create" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>&nbsp Nueva apertura</p>
                    </a>
                  </li>
                </ul>
 
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-window-close"></i>
              <p>
                Cierre de caja
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                    <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/cierre" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-file-pdf nav-icon"></i>
                      <p>&nbsp Reportes</p>
                    </a>
                  </li>
                </ul>
              </li>             
            </ul>
          </li>
                    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Historial de las cajas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/historial" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>         
            </ul>
          </
           </ul>
          </li>
        </div>
        </li>
        </ul>
    </nav>

    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->