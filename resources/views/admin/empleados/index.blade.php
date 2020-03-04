@extends('layouts.admin')
@section('title', 'Empleadoss')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="panel-heading">
					<h4>Vista general de los empleados</h4>
				</div>
				<div class="panel-body">
					<span class="pull-right">
						<a class="btn btn-md btn-success" href="/empleados/create" class="btn btn-link">
							<i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo empleado
						</a>
					</span>
					<ul class="list-inline">
						<li>
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="/empleados" class="link_ruta">
								empleados
							</a>
						</li>						
					</ul><br>
					@include('partials.menu_productos')<br>
				
					<div>
						<table id="example" class="table table-striped table-bordered" style="width:100%">
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
                                    <td>{{$empleado->id_empleado}}</td>
                                    <td>{{$empleado->nb_nombre}}</td>
                                    <td>{{$empleado->nb_apellido}}</td>
                                    <td>{{$empleado->nu_cedula}}</td>
                                    <td>{{$empleado->fe_ingreso}}</td>
                                    <td><div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                          <i class="fa fa-gears"></i> <span class="caret"></span>
                                        </button>
                                        <ul class=" dropdown-menu dropdown-menu-right">
                                          <li><a href="{{  url('empleados', [$empleado->id_empleado]) }}"><i class="fa fa-eye"></i> Perfil</a></li>
                                          @can('edit_users')
                                          <li><a href="{{ url('empleados', [$empleado->id_empleado, 'edit']) }}"><i class="fa fa-edit"></i> Editar</a></a></li>
                                          @endcan
                                          @can('view_logdins')
                                          <li class="divider"><li>
                                          <li><a href="{{ url('user/login', [$empleado->id_empleado]) }}"><i class="fa fa-sign-in"></i> Logins</a></li>
                                          @endcan
                                          @if(auth()->user()->can('delete_empleado') && Auth::user()->id != $empleado->id)
                                          <li class="divider"><li>
                                          <li><a href="#confirm-modal" id="{{ $empleado->id_empleado }}"  class="del-btn" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a></li>
                                          @endif
                                        </ul>
                                      </div></td>
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
						{{ $empleados->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
 <script src="{{ asset('js/dataTable.min.js') }}"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
        </script>
@endpush