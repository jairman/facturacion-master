@extends('layouts.admin')

@section('title', 'Tasa del día')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">Editar</li>
@endsection

@section('content')

  <section class="content">
    <div class="container">
      <div class="col-md-6">
        <div class="btn-group">
          @can('view_users')
          <a href="{{ url('tasa') }}" class="btn btn-primary"><i class="fa fa-sort-alpha-desc"></i> Listado</a>
          @endcan
          @can('add_tasa_diaria')
          <a href="{{ url('tasa/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="card col-md-12">
        <div class="card card-primary card-outline card-header">Editar tasa del día</div>
        <div class=" card-body">
           {!! Form::model($tasas, ['route' => ['tasa.update',$tasas->id],'method' => 'PUT']) !!}
            <div class="card-body">
              
             @include('admin.tasa.partials.datos')
              
       
        </div>
       
      </div>
      <div class="mb-3">
              <button type="submit" class="btn btn-primary ajax" id="submit">
                <i id="ajax-icon" class="fa fa-edit"></i> Editar
              </button>
            </div>
    </div>

         {!! Form::close()!!}
  </section>

@endsection

@push('scripts')

@endpush
