<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CierreCaja;
use App\Models\AperturaCaja;
use App\Models\Empleados;
use App\Models\Proveedor;
use App\Models\Cliente;
use App\Models\Gastos;
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


    public function index()
    {
        
        $user= $this->user();
        $id= \Auth::user()->id;

        if ($user) {
            $count = User::count();
            $producto= Producto::count();
            $comprobante=Comprobante::count();
            $clientes = Cliente::count();
            $proveedor = Proveedor::count();
            $cierre = CierreCaja::count();
            $apertura = AperturaCaja::count();
          return view('admin.home.index',compact('count','cierre','apertura','proveedor','clientes','comprobante','producto'));
         } 
            $count = User::where('id',$id)->count();
            $producto= Producto::count();
            $comprobante=Comprobante::where('usuario_id',$id)->count();
            $clientes = Cliente::where('usuario_id',$id)->count();
            $proveedor = Proveedor::where('usuario_id',$id)->count();
            $cierre = CierreCaja::where('usuario_id',$id)->count();
            $apertura = AperturaCaja::where('usuario_id',$id)->count();
          return view('admin.home.index',compact('count','cierre','apertura','proveedor','clientes','comprobante','producto'));
        
    }
}
