@extends('layouts.admin')
@section('title', 'comprobantes')
@section('content')
<div class="container">
   
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de comprobantes</h4>
				</div>
				<div class="card-body">
					<div class="col-sm-3 float-left">
					<a href="/comprobantes/nuevo"class="btn btn-block btn-primary">
									Nuevo comprobante
									<span class="float-right">
										<i class="fa fa-plus-square" aria-hidden="true"></i>
									</span>
								</a>
					</div>

					<div class="col-sm-3 float-right">
					<a href="/comprobantes/excel" class="btn btn-block btn-success">
									Exportar Excel
									<span class="float-right">
										<i class="fa fa-print" aria-hidden="true"></i>
									</span>
								</a>
					</div>
					<div class="col-sm-3 float-left">
						
					</div>
					<div class="table-responsive"><br>
						<table id="example" cellspacing="0" class="table table- table-border">
							<thead>
							<tr>								
								<th class="text-center " width="120px">Fecha emisión</th>
								<th class="text-center " width="200px">Tipo comprobante</th>
							<!--
								<th class="text-center ">Descripción</th>
							-->
								<th class="text-center ">Cliente</th>
								<th class="text-center " class="text-center " width="120px">Sub-total</th>
								<th class="text-center " class="text-center " width="120px">IVA</th>
								<th class="text-center " class="text-center " width="120px">Total</th>
								<th class="text-center " class="text-center " width="120px">N° Caja</th>
								<th class="text-center"></th>	
								<th class="text-center"></th>								
							</tr>
							</thead>
							<tbody>

							@foreach($comprobantes as $comprobante)
							<tr>								
								<td class="text-center ">{{ date('d / m / Y', strtotime($comprobante->fecha_emision)) }}</td>
								<td class="text-center ">{{ $comprobante->tipo->nombre }}</td>
							<!--
								<td class="text-center ">
									<?php $i=0; ?>
									@foreach($comprobante->lineasproducto as $l)
										@if($i<2)
											x {{ $l->cantidad}}  {{$l->producto->nombre}}, 
											<?php $i++; ?>
										@elseif($i==2)
											{{$l->producto->nombre}} x {{ $l->cantidad}}
											<?php $i++; ?>
										@endif
									@endforeach
								</td>
							-->
								@if($comprobante->cliente)

								<td class="text-center  " title="{{$comprobante->cliente->rif}}">
									<a href="/clientes/detalle/{{$comprobante->cliente->id}}">
										{{$comprobante->cliente->nombre}} {{$comprobante->cliente->apellido}}
									</a>
								</td>

								@endif
								
								<td>
								
									<span class="float-right">
										{{ number_format($comprobante->subTotal, 2) }}
									</span>
								</td>

								<td>
									
									<span class="float-right">
										{{ number_format($comprobante->iva, 2) }}
									</span>
								</td>

								<td>
									
									<span class="float-right">
										{{ number_format($comprobante->total, 2) }}
									</span>
								</td>
								<td>
									
									<span class="float-right">
										{{$comprobante->usuario_id }}
									</span>
								</td
								<td class="text-center " title="Vista de impresión">
									<a target="_blank" href="/comprobantes/imprimir/{{$comprobante->id}}">
										<i class="fas fa-print" aria-hidden="true"></i>
									</a>
								</td>

								<td class="text-center " title="Detalle del comprobante">
									<a href="/comprobantes/detalle/{{$comprobante->id}}">
										<i class="fas fa-external-link-square-alt" aria-hidden="true"></i>
									</a>
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					<div class="text-center ">
						{{ $comprobantes->links( "pagination::bootstrap-4") }}
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