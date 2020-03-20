@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">Listado</li>
@endsection

@section('content')

    <section class="content">
      <div class="container">
        <div class="col-md-6">
          <div class="btn-group">
         
            <a href="{{ url('user/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
         
          </div>
        </div>
      </div>
      <br>
      @include('partials.mensajes');
      <div class="container">
        <div class="col-md-12">
          <div class="card">
            <div class="card-primary card-outline card-header">
              <h3 >Listado de usuarios</h3>

            </div>
            <div class="card-body ">
              <table id="example" class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Correo electrónico</th>
                    <th>Acceso</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr class="row{{ $user->encode_id }}">
                  <td>{{ $user->full_name }}</td>
                  <td>{!! $user->hasRole('admin') ? '<b>Administrador</b>' : 'Vendedor' !!}</td>
                  <td>{{ $user->email  }}</td>
                  <td><span class="badge {{ $user->status ? 'bg-green' : 'bg-red' }}">{{ $user->display_status }}</span></td>
                  <td>{{ $user->created_at }}</td>
                  <td>{{ $user->updated_at }}</td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-cogs"></i>&nbsp Opciones
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{  url('user', [$user->encode_id]) }}"><i class="fa fa-eye"></i> Perfil</a></li>
                         @can('edit_users')
                        <li><a class="dropdown-item" href="{{ url('user', [$user->encode_id, 'edit']) }}"><i class="fa fa-edit"></i> Editar</a></a></li>
                        @endcan
                       @can('view_logins')
                        <li class="divider"><li>
                        <li><a class="dropdown-item" href="{{ url('user/login', [$user->encode_id]) }}"><i class="fas fa-sign-in-alt"></i> Logins</a></li>
                        @endcan
                        @if(auth()->user()->can('delete_users') && Auth::user()->id != $user->id)
                        <li class="divider"><li>
                        <li><a class="dropdown-item" href="#confirm-modal" id="{{ $user->encode_id }}"  class="del-btn" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a></li>
                        @endif
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
             <div class="card-footer">
                  <p class="text-muted">Mostrando <strong>{{ $users->count() }}</strong> registros de <strong>{{$users->total() }}</strong> totales</p>
              </div>
          </div>
        </div>
      </div>
    </section>


@endsection

@push('scripts')
  <script src="{{ asset('js/admin/user/index.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {

    var table = $('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
            }
        },
    });
    } );
        </script>
@endpush
