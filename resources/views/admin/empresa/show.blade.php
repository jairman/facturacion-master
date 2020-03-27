@extends('layouts.admin')
@section('title', 'Empresa')
@section('content')

<div class="container">
  <div class="card card-primary card-outline">
    <div class="col-xs-12">
      <div class=" card-primary card-outline card-header">
        <h2 class="card-title">
          <i class="fa fa-user"></i> Datos de la empresa
          <h5 class="pull-right ml-3">({{ $empresas->nombre }})</h5>
        </h2>
      </div>
    </div>
  <div class="card-body">
    <div class="row card-body  ">
      <div class="col-sm-6 mb-3">
        <strong>Nombre</strong><br>
         {{ $empresas->nombre }}
      </div>
      <div class="col-sm-6 mb-3">
          <strong>Rif</strong>
          <br>
         {{ $empresas->rif }}
        </div>
        <div class="col-sm-6 mb-3">
            <strong>Teléfono</strong><br>
            {{ $empresas->telefono}}
          </div>
          <div class="col-sm-6 mb-3">
              <strong>Dirección</strong><br>
             {{ $empresas->direccion}}
          </div>
      </div>
			 </div>
			  <div class="card-footer">
				<div class="row align-items-center">
				    <div class="col-sm-4">
				      
		                <a href="{{ url('empresa', [$empresas->id, 'edit']) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
		               
				    </div>
				  </div>
			 </div>
	  </div>
</div>



@endsection