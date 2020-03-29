@extends('layouts.admin')
@section('title', 'productos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de los productos más <b>Vendidos durante el mes cursante </b></h4>
				</div>

				<div class="card-body">
					<span class="pull-right">
						<a class="btn btn-md btn-success w3-card-4" href="/productos/nuevo" class="btn btn-link" >
							<i class="fa fa-plus" aria-hidden="true"></i> Nuevo producto
						</a>
					</span>
					<br><br><br>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/productos" class="link_ruta">
								Productos
							</a>
						</li>
					</ul><br>
					<div class="row">
						<div class="container-fluid">
					        <div class="card">
					            <canvas id="employee"></canvas>
					        </div>x
					    </div>
				</div>                
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
 <script src="{{asset('js/Chart.js')}}"></script>
  {{-- Create the chart with javascript using canvas --}}
    <script>
        // Get Canvas element by its id
        employee_chart = document.getElementById('employee').getContext('2d');
        chart = new Chart(employee_chart,{
            type:'line',
            data:{
                labels:[
                    /*
                        this is blade templating.
                        we are getting the date by specifying the submonth
                     */
                    '{{Carbon\Carbon::now()->subMonths(4)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(3)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(2)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(1)->toFormattedDateString()}}'
                    ],
                datasets:[{
                    label:'Cantidad de productos vendidos en los úlitmos 4 meses',
                    data:[
                        '{{$emp_count_4}}',
                        '{{$emp_count_3}}',
                        '{{$emp_count_2}}',
                        '{{$emp_count_1}}'
                    ],
                    backgroundColor: [
                        'rgba(178,235,242 ,1)'
                    ],
                    borderColor: [
                        'rgba(0,150,136 ,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
