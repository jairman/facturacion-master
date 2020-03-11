@extends('layouts.admin')
@section('title', 'Apertura de caja')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-header">
					<h4>Apertura de caja</h4>
				</div>

				<div class="card-body">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/apertura" class="link_ruta">
								Apertura de caja &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/apertura/create" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
					<div class="row">
						<div class="container row">
							<div class="col-md-12 col-md-offset-0">
								<legend>Datos para la apertura de la caja</legend><br>
								<form method="post" action="{{route('apertura.store')}}">
									{{ csrf_field() }}
									<div class="form-group row">
                                     
                                        <div class="col-md-4">
                                            <label class="sr-only">N° de caja</label><br>
                                            <select name="caja_id" id="caja_id" class="form-control" oninvalid="this.setCustomValidity('Debe ingresar el número de caja')"Debe  required="true" oninput="setCustomValidity('')">
                                                <option value="0">Número de caja</option>
                                                @foreach($cajas as $caja)
                                                    <option value="{{ $caja->id }}">{{ $caja->nu_caja }}</option>
                                                @endforeach
                                            </select>
                                        </div>
									
									<div class="col-md-4">
										<label class="sr-only"></label><br>
                                        <input class="form-control" type="text"  id="nu_cantidad_efectivo"  name="nu_cantidad_efectivo" placeholder="Cantidad de efectivo en caja" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de efectivo en caja.')" oninput="setCustomValidity('')">
									</div>

									<div class="col-md-4">
										<br>
										<input class="form-control" type="text" name="nu_cantidad_punto_venta" id="nu_cantidad_punto_venta" placeholder="Cantidad de dinero en punto de venta" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de dinero en punto de venta.')" oninput="setCustomValidity('')">
									</div>
									<div class="col-md-4">
										<br>
										<input class="form-control" type="text" id="nu_cantidad_dolares" name="nu_cantidad_dolares" placeholder="Cantidad de dólares en efectivo en caja" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de efectivo en dolares que posee en caja.')" oninput="setCustomValidity('')">
									</div>
									<div class="col-md-4">
										<br>
										<input class="form-control" type="text" name="nu_cantidad_transferencias" id="nu_cantidad_transferencias" placeholder="Cantidad de dinero por concepto de transferencias" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de dinero por concepto de transferencia.')" oninput="setCustomValidity('')">
									</div>

									<div class="col-md-4">
										<br>
										<input class="form-control" type="text" name="nu_cantidad_pago_movil" id="nu_cantidad_pago_movil" placeholder="Cantidad de dinero ingresado por concepto de pago móvil" required="true" oninvalid="this.setCustomValidity('Debe ingresar la cantidad de dinero por concepto de pago móvil.')" oninput="setCustomValidity('')">
									</div>
									<div class="col-md-4">	
                                      
                                        <div class="checkbox icheck">  <br>
                                          <label>
                                            <input type="radio" name="status" id="status" value="1" checked> Aperturar Caja&nbsp;&nbsp;
                                          </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id}}">
									<div class="col-md-4">
                                        <label class="sr-only" for="txtFecha">Fecha de emisión</label><br>
                                        <input id="fecha_emision" type="date" name="fecha_emision" class="form-control input-sm" title="Fecha del recibo">
									</div>
                                   
									<div class="col-md-12"> <br>
										<button type="submit" class="btn btn-block btn-primary">Guardar</button>
									</div>
								</form>
							</div>
							
							<div class="col-md-5 col-md-offset-2">                				

                			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('partials.mensajes');
</div>
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
@endpush

