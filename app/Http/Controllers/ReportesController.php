<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
	
	 public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * REPORTES DE INVENTARIO
     */

     /**
     * REPORTES DE COMPROBANTES
     */
    public function indexComprobantes(Request $request){
        return view('comprobantes.comprobantesReportes.index');
    }
}
