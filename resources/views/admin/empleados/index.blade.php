@extends('layouts.admin')
@section('title', 'Empleados')
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
                    <span class="float-left">
                        <a class="btn btn-md btn-primary" href="/pagos/empleado" class="btn btn-link">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Pagos del empleado
                        </a>
                    </span><br><br><br>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="/" class="link_ruta">
                                Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/empleados" class="link_ruta">
                                Empleados
                            </a>
                        </li>                       
                    </ul><br>
            
                    <div class="table-responsive">
                        <table id="example" cellspacing="0" width="100%" class="table table-hover table-border">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th> 
                                <th class="text-center">Nombres</th>
                                <th class="text-center">Apellidos</th>
                                <th  class="text-center">Cédula</th>
                                <th class="text-center">Teléfono</th>
                                <th  class="text-center">Profesión</th>
                                <th  class="text-center">Fecha de ingreso</th>
                                <th  class="text-center">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach( $empleados as $empleado)
                            <tr class="text-center">
                                <td> {{ $empleado->id_empleado }} </td>     
                                <td> {{ $empleado->nb_nombre }}</td>
                                <td> {{ $empleado->nb_apellido }}</td>
                                <td> {{ $empleado->nu_cedula }}</td>
                                <td> {{ $empleado->telefono }}</td>
                                <td> {{ $empleado->nb_profesion }}</td>
                                <td> {{ $empleado->fe_ingreso }}</td>                 
                                <td>
                                <a href="{{route('empleados.edit', $empleado->id_empleado)}}"
                                    class="btn btn-sm btn-primary"><i class="fas fa-edit fa-lg"></i></a>
                                </td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.mensajes');
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