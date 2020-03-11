@extends('layouts.admin')

@section('title', 'Permisos')


@section('content')

    <section class="content">
      <div class="container">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Permisos del rol usuario</h2>
                <div class="card-tools"></div>
              </div>
              <div class="card-body table-responsive table-striped">
                <form role="form" id="main-form">
                  <input type="hidden" id="_url" value="{{ url('permission', ['user']) }}">
                  <input type="hidden" id="_token" value="{{ csrf_token() }}">
                  <table class="table table-responsive">
                    <tr>
                      <h3>Usuarios</h3>
                    </tr>
                    <tr>
                      <td>
                        Ver usuarios<br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_users" {{ $role->hasPermissionTo('view_users') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_users" {{ $role->hasPermissionTo('add_users') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit_users" {{ $role->hasPermissionTo('edit_users') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete_users" {{ $role->hasPermissionTo('delete_users') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver logins</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_logins" {{ $role->hasPermissionTo('view_logins') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Asignar permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="assign_permissions" {{ $role->hasPermissionTo('assign_permissions') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar Facturas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_facturas" {{ $role->hasPermissionTo('add_facturas') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver Facturas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_facturas" {{ $role->hasPermissionTo('view_facturas') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar Facturas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit_facturas" {{ $role->hasPermissionTo('edit_facturas') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar Facturas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete_facturas" {{ $role->hasPermissionTo('delete_facturas') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                     <td>
                        Agregar proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_proveedores" {{ $role->hasPermissionTo('add_proveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_proveedores" {{ $role->hasPermissionTo('view_proveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit_proveedores" {{ $role->hasPermissionTo('edit_proveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete_proveedores" {{ $role->hasPermissionTo('delete_proveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar clientes</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_clientes" {{ $role->hasPermissionTo('add_clientes') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <tr>
                        <td>
                        Ver clientes</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_clientes" {{ $role->hasPermissionTo('view_clientes') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar clientes</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit_clientes" {{ $role->hasPermissionTo('edit_clientes') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar clientes</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete_clientes" {{ $role->hasPermissionTo('delete_clientes') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar empleados</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_empleados" {{ $role->hasPermissionTo('add_empleados') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver empleados</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_empleados" {{ $role->hasPermissionTo('view_empleados') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      </tr>
                      <tr>
                       <td>
                        Editar empleados</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit_empleados" {{ $role->hasPermissionTo('edit_empleados') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar empleados</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete_empleados" {{ $role->hasPermissionTo('delete_empleados') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar apertura de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_apertura_caja" {{ $role->hasPermissionTo('add_apertura_caja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver apertura de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_apertura_caja" {{ $role->hasPermissionTo('view_apertura_caja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar cierre de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_cierre_caja" {{ $role->hasPermissionTo('add_cierre_caja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <tr>
                        <td>
                           Agregar productos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_productos" {{ $role->hasPermissionTo('add_productos') ? 'checked' : '' }}>
                          </label>
                        </div>
                        </td>
                        <td> Ver productos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_productos" {{ $role->hasPermissionTo('view_productos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        <td> Editar productos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit_productos" {{ $role->hasPermissionTo('edit_productos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        <td> Eliminar productos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete_productos" {{ $role->hasPermissionTo('delete_productos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        <td> Ver movimientos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_movimientos" {{ $role->hasPermissionTo('view_movimientos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      </tr>
                      <tr>
                        <td> Agregar gastos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_gastos" {{ $role->hasPermissionTo('add_gastos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        <td> Ver gastos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_gastos" {{ $role->hasPermissionTo('view_gastos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        <td> Editar gastos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit_gastos" {{ $role->hasPermissionTo('edit_gastos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        <td> Eliminar gastos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete_gastos" {{ $role->hasPermissionTo('delete_gastos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td> Ver cierre de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_cierre_caja" {{ $role->hasPermissionTo('view_cierre_caja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        
                      </tr>
                      </tr>
                    </tr>
                  </table>
                  <div class="box-footer clearfix"></div>
                   <div class="form-group pading">
                     <label for="name">Contraseña actual</label>
                     <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Contraseña actual">
                     <span class="missing_alert text-danger" id="current_password_alert"></span>
                    </div>
                    <button type="submit" class="btn btn-primary ajax" id="submit">
                      <i id="ajax-icon" class="fa fa-edit"></i> Editar
                    </button>
                  </div>
                </form>
            </div>
          </div>
      </div>
    </section>


@endsection

@push('scripts')
 <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
 </script>
  <script src="{{ asset('js/admin/permission/index.js') }}"></script>
@endpush
