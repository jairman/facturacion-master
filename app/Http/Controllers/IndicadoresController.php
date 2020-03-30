<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\LineaProducto;
use App\Models\Producto;
use App\Models\Factura;
use Carbon\Carbon;

class IndicadoresController extends Controller
{
  
	        public function __construct()
    {
        $this->middleware('auth');
    }


    public function masVendidos(Request $request, $mes){	

    	 //get Current date and time
        $date_current = Carbon::now()->toDateTimeString();
        //get date and time of previous month
        /**
         *  subMonths() means it will subtract the month with
         *  the given argument.
         */
        $prev_date1 = $this->getPrevDate(1);
        $prev_date2 = $this->getPrevDate(2);
        $prev_date3 = $this->getPrevDate(3);
        $prev_date4 = $this->getPrevDate(4);

        /**
         *  get count of employee between two given dates.
         */
        $emp_count_1 = LineaProducto::whereBetween('fecha',[$prev_date1,$date_current])
        ->where('precioUnitario', '<>', null)
        ->count();
        $emp_count_2 = LineaProducto::whereBetween('fecha',[$prev_date2,$prev_date1])
        ->where('precioUnitario', '<>', null)
        ->count();
        $emp_count_3 = LineaProducto::whereBetween('fecha',[$prev_date3,$prev_date2])
        ->where('precioUnitario', '<>', null)
        ->count();
        $emp_count_4 = LineaProducto::whereBetween('fecha',[$prev_date4,$prev_date3])
        ->where('precioUnitario', '<>', null)
        ->count();

        //dd(Carbon::now()->subMonths(4)->format('m'));

		$masVendidos = DB::table('linea_productos')
			->join('productos', 'productos.id', '=', 'linea_productos.producto_id')
			->selectRaw(
				'productos.nombre AS producto, SUM(cantidad) as total_sales'
			)
			->where('precioUnitario', '<>', null)
			->whereMonth('linea_productos.fecha', '=', $mes)
			->groupBy('productos.nombre')
            ->orderBy('total_sales','desc')
			->get()->toArray();

            

           
            

		//dd($emp_count_1,$emp_count_2, $emp_count_3, $emp_count_4);			
    	return view('admin.productos.vendidos')->with(compact(
                                                              'masVendidos',
															  'emp_count_1',
															  'emp_count_2',
															  'emp_count_3',
															  'emp_count_4'
));
    }

        /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();

    }
}
