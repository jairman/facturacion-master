
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
                <p>Vendedores</p>
              </a>
            </li>
          </ul>
        
        </li>
        <div class=" mt-3 pb-3 mb-3 ">
              <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                  Sistema
                  <i class="right fas fa-angle-left"></i>
              </p>
              </a>
          
              <ul class="nav nav-treeview">
              
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Inventario
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/productos/nuevo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar producto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/productos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/productos/movimientos" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Ver movimiento</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Generar reportes</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Comprobantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/comprobantes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/comprobantes/nuevo" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>&nbsp Comprobante nuevo</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/comprobantes/imprimir" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>&nbsp Reportes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/comprobantes/vencimientos" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>&nbsp  Vencimientos</p>
                    </a>
                  </li>
                </ul>
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Gastos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/clientes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="clientes/nuevo" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>&nbsp Nuevo cliente</p>
                    </a>
                  </li>
                </ul>
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Proveedores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proveedores" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/proveedores/nuevo" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>&nbsp Proveedor nuevo</p>
                    </a>
                  </li>
                </ul>
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Empleados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/empleados" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
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
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Apertura de caja
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/apertura" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
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
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Cierre de caja
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/cierre" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>&nbsp Vista general</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Opciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>&nbsp Reportes</p>
                    </a>
                  </li>
                </ul>
              </li>             
            </ul>
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