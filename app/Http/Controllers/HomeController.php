<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TasaDolar;
use App\Models\CierreCaja;
use App\Models\AperturaCaja;
use App\Models\Empleados;
use App\Models\Proveedor;
use App\Models\Cliente;
use App\Models\Moneda;
use App\Models\Comprobante;
use App\Models\Producto;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function user(){

        $usuario = \Auth::user()->hasrole('admin');

        return $usuario;

    }

        public function company(){

        $carbon = new \Carbon\Carbon();
        $date =$carbon->format('Y-m-d');

        $empresa = \Empresa::where('fecha_emision', $date)->get();

        return $empresa;

    }


    public function index()
    {
        
        $user = $this->user();
        $company = $this->company();

        if ($user) {

            if ($company) {

            $count = TasaDolar::count();
            $producto= Producto::count();
            $comprobante=Comprobante::count();
            $clientes = Cliente::count();
            $proveedor = Proveedor::count();
            $cierre = CierreCaja::count();
            $apertura = AperturaCaja::count();
            $empleados = Empleados::count();
            $gastos = Moneda::count();
            return view('admin.home.index',compact('count','cierre','apertura','proveedor','clientes','comprobante','producto','empleados','gastos'));
            }

             $notification = array(
            'message' => '¡Debe ingresar los datos de su empresa!',
            'alert-type' => 'error'
        );
        
        return \Redirect::to('/empresa/create')->with($notification);
         } 
            $count = TasaDolar::count();
            $producto= Producto::count();
            $comprobante=Comprobante::count();
            $clientes = Cliente::count();
            $proveedor = Proveedor::count();
            $cierre = CierreCaja::count();
            $apertura = AperturaCaja::count();
            $empleados = Empleados::count();
            $gastos = Moneda::count();
          return view('admin.home.index',compact('count','cierre','apertura','proveedor','clientes','comprobante','producto','empleados','gastos'));
        
    }
}
