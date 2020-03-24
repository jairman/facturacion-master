    <div class="col-md-4">
	 <label class="">Empleados</label><br>
	    <select name="empleado_id" class="form-control input-sm">
	    	
		@foreach($empleados as $empleado)
				<option value="{{$empleado->id_empleado}}" selected="true">{{$empleado->nb_nombre}}</option>
		@endforeach
	</select>
	</div>					
	<div class="col-md-4">
		<label class="">Tipo de pago</label><br>
      <select name="tipo_pago_empleado_id" class="form-control input-sm">
	    
		@foreach($tipos as $tipo)
				<option value="{{$tipo->id_tipo_pago_empleado}}" selected="true">{{$tipo->nb_tipo_pago_empleado}}</option>
		@endforeach
	</select>
	</div>

	<div class="col-md-4">
		<label class="">Sueldo base</label><br>
		{!! Form::text('nu_sueldo_base', null,array('class' => 'form-control input-sm','placeholder'=>'Sueldo base del empleado ','id'=>'nu_sueldo_base')) !!}
	</div>

	<div class="col-md-4">
		<label class="">Modo de pago</label><br>
      <select name="modo_pagos_id" class="form-control input-sm">
		@foreach($modos as $modo)
				<option value="{{$modo->id_modo_pago}}" selected="true">{{$modo->nb_modo_pago}}</option>
		@endforeach
	</select>
	</div>
	<div class="col-md-4">
		<label class="">Ingrese el monto</label><br>
		{!! Form::text('nu_cantidad_tipo_pago', null,array('class' => 'form-control input-sm','placeholder'=>'Dinero a cancelar o deducir del empleado ','id'=>'nu_cantidad_tipo_pago')) !!}
	</div>

    <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id}}">
	
	<div class="col-md-4">
        <label class="" for="txtFecha">Fecha</label><br>
        {!! Form::date('fecha', null,array('class' => 'form-control input-sm','placeholder'=>'Nombres del empleado ','id'=>'fecha')) !!}
	</div>
   