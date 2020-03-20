@extends('layouts.admin')
@section('title', 'Empleadoss')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de los empleados</h4>
				</div>
				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-md btn-success" href="/empleados/create" class="btn btn-link">
							<i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo empleado
						</a>
					</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/empleados" class="link_ruta">
								empleados
							</a>
						</li>						
					</ul><br>
					
					<table id="example" class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Cédula</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            @foreach ($empleados as $empleado)
                                
                           
                            <tbody>
                                <tr>
                                    <td>{{$empleado->id_empleado_empleado}}</td>
                                    <td>{{$empleado->nb_nombre}}</td>
                                    <td>{{$empleado->nb_apellido}}</td>
                                    <td>{{$empleado->nu_cedula}}</td>
                                    <td>{{$empleado->fe_ingreso}}</td>
                                    <td>
                                    	<div class="dropdown">
					                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                       <i class="fas fa-cogs"></i>&nbsp Opciones
					                      </button>
					                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					                        <a class="dropdown-item" href="{{  url('empleados', [$empleado->id_empleado]) }}"><i class="fa fa-eye"></i> Perfil</a></li>
					                         @can('edit_users')
					                        <li><a class="dropdown-item" href="{{ url('empleados', [$empleado->id_empleado, 'edit']) }}"><i class="fa fa-edit"></i> Editar</a></a></li>
					                        @endcan
					                       @can('view_logins')
					                        <li class="divider"><li>
					                        <li><a class="dropdown-item" href="{{ url('empleados/login', [$empleado->id_empleado]) }}"><i class="fas fa-sign-in-alt"></i> Logins</a></li>
					                        @endcan
					                        @if(auth()->user()->can('delete_users') && Auth::user()->id_empleado != $empleado->id_empleado)
					                        <li class="divider"><li>
					                        <li><a class="dropdown-item" href="#confirm-modal" id="{{ $empleado->id_empleado }}"  class="del-btn" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a></li>
					                        @endif
					                      </div>
					                    </div>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <<th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Cédula</th>
                                    <th>Fecha de ingreso</th>
                                    
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
					</div>
					<div class="text-center">
						{{ $empleados->links( "pagination::bootstrap-4")}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
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