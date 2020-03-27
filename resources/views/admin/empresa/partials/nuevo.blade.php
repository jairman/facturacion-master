<div class="col-md-4">
		<label class="">Nombre</label><br>
		{!! Form::text('nombre', null,array('class' => 'form-control input-sm','placeholder'=>'Nombre de la empresa ','id'=>'nombre')) !!}
	</div>
	<div class="col-md-4">
		<label class="">Rif</label><br>
		{!! Form::text('rif', null,array('class' => 'form-control input-sm','placeholder'=>'Rif de la empresa ','id'=>'rif')) !!}
	</div>
	<div class="col-md-4">
		<label class="">Teléfono</label><br>
		{!! Form::text('telefono', null,array('class' => 'form-control input-sm','placeholder'=>'Número telefónico de la empresa ','id'=>'telefono')) !!}
	</div><br><br>
	<div class="col-md-6">
     <label class="">Dirección</label>
     {!! Form::textarea('direccion', null,array('class' => 'form-control input-sm','placeholder'=>'Dirección de la empresa','id'=>'direccion')) !!}
    </div>