@extends('layouts.admin')
@section('title', 'Empleadoss')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-header">
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
					
					<table id="" class="table table-hover" style="width:100%">
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
 <script src="{{ asset('js/dataTable.min.js') }}"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
        </script>
@endpush