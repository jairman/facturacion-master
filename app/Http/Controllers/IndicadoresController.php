<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\LineaProducto;
use App\Producto;
use App\Factura;


class IndicadoresController extends Controller
{
  

	        public function __construct()
    {
        $this->middleware('auth');
    }


    public function masVendidos(Request $request, $mes){
		$masVendidos = DB::table('linea_productos')
			->join('productos', 'productos.id', '=', 'linea_productos.producto_id')
			->selectRaw(
				'productos.nombre AS producto, SUM(cantidad) as total_sales'
			)
			->where('precioUnitario', '<>', null)
			->whereMonth('linea_productos.fecha', '=', $mes)
			->groupBy('productos.nombre')
			->paginate(5);
			
    	return view('admin.productos.vendidos')->with(compact('masVendidos'));
    }
}
