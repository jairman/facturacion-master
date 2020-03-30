@extends('layouts.admin')
@section('title', 'productos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="w3-card-4 w3-white">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de los productos vendidos en los últimos 4 meses.</h4>
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
                            <div class="col-md-12">
					          <div class="card-body">
                                <div class="chart">
					             <canvas id="employee"></canvas>
    					        </div>
    					    </div>
                        </div>
                    </div>
				</div>            
			</div>  
                <div class="col-md-12">         
                  <div class="card-header">
                    <h3 class="card-title">Cantidad de los 3 productos más vendidos</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="donutChart"style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
        var barChartCanvas = $('#employee').get(0).getContext('2d')
        chart = new Chart(barChartCanvas,{
            type:'line',
            data:{
                labels:[
                    /*
                        this is blade templating.
                        we are getting the date by specifying the submonth
                     */
                    '{{Carbon\Carbon::now()->subMonths(3)->format('F - Y')}}',
                    '{{Carbon\Carbon::now()->subMonths(2)->format('F - Y')}}',
                    '{{Carbon\Carbon::now()->subMonths(1)->format('F - Y')}}',
                    '{{Carbon\Carbon::now()->format('F - Y')}}'
                    ],
                datasets:[{
                    label:'Cantidad de ventas realizadas en los úlitmos 4 meses',
                    data:[
                        '{{$emp_count_4}}',
                        '{{$emp_count_3}}',
                        '{{$emp_count_2}}',
                        '{{$emp_count_1}}'
                    ],
                    backgroundColor: [
                       'rgba(60,141,188,0.9)'
                    ],
                    borderColor: [
                        'rgba(60,141,188,0.9)'
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
    <script>
 $ (function() {
        //-------------
    //- DONUT CHART -


    var areaChartData = {
      labels  : [                    /*
                        this is blade templating.
                        we are getting the date by specifying the submonth
                     */
                    '{{Carbon\Carbon::now()->format('F - Y')}}',
                    '{{Carbon\Carbon::now()->addMonth()->format('F - Y')}}',
                    '{{Carbon\Carbon::now()->addMonth(2)->format('F - Y')}}',
                    '{{Carbon\Carbon::now()->addMonth(4)->format('F - Y')}}'],
      datasets: [
        {
          label               : ' {{$masVendidos[0]->producto}} ' + ' ({{$masVendidos[0]->total_sales}}) ',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [ ' {{$masVendidos[0]->total_sales}}' ]
        },
        {
          label               : ' {{$masVendidos[1]->producto}}'+ ' ({{$masVendidos[1]->total_sales}}) ',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : true,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [ ' {{$masVendidos[1]->total_sales}}']
        },
                {
          label               : ' {{$masVendidos[2]->producto}}'+ ' ({{$masVendidos[2]->total_sales}}) ',
          backgroundColor     : '#f56954',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : true,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [ ' {{$masVendidos[2]->total_sales}}']
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#donutChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
        });
    </script>
@endpush
