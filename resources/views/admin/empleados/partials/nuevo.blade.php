    <div class="col-md-4">
                                            <label class="">Nombres</label><br>
                                            {!! Form::text('nb_nombre', null,array('class' => 'form-control input-sm','placeholder'=>'Nombres del empleado ','id'=>'nb_nombre')) !!}
                                        </div>
									
									<div class="col-md-4">
										<label class="">Apellidos</label><br>
                                       {!! Form::text('nb_apellido', null,array('class' => 'form-control input-sm','placeholder'=>'Apellidos del empleado ','id'=>'nb_apellido')) !!}
									</div>

									<div class="col-md-4">
										<label class="">Cédula</label><br>
										{!! Form::text('nu_cedula', null,array('class' => 'form-control input-sm','placeholder'=>'Cédula del empleado ','id'=>'nu_cedula')) !!}
									</div>
									<div class="col-md-4">
										<label class="">Teléfono</label><br>
										{!! Form::text('telefono', null,array('class' => 'form-control input-sm','placeholder'=>'Teléfono del empleado ','id'=>'telefono')) !!}
									</div>
									<div class="col-md-4">
										<label class="">Profesión</label><br>
										{!! Form::text('nb_profesion', null,array('class' => 'form-control input-sm','placeholder'=>'Profesion del empleado ','id'=>'nb_profesion')) !!}
									</div>
									
                                    <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id}}">
									<div class="col-md-4">
                                        <label class="" for="txtFecha">Fecha de ingreso</label><br>
                                        {!! Form::date('fe_ingreso', null,array('class' => 'form-control input-sm','placeholder'=>'Nombres del empleado ','id'=>'fe_ingreso')) !!}
									</div>
                                   
									<div class="col-md-12"> <br>
										<button type="submit" class="btn btn-block btn-primary">Guardar</button>
									</div>