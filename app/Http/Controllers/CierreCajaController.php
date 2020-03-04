<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CierreCaja;
use App\Models\AperturaCaja;
use App\Models\Caja;

class CierreCajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function apertura()
    {
        
        $carbon = new \Carbon\Carbon();
        $date =$carbon->format('Y-m-d');
    
    
        $usuario= \Auth::user()->id;
        $apertura=AperturaCaja::where('apertura_caja.status','=','1')
        ->where('usuario_id',$usuario )
        ->where('fecha_emision',$date)
        ->get();
    

        return ( count($apertura) > 0) ? true : false ;
    }

    public  function usuario(){

        $usuario_id= \Auth::user()->id;
            
         return $usuario_id;
    }


    public function index()
    {
        $usuario= \Auth::user()->id;

        $id = $this->usuario();
     
        if($id <> 1 ){

            $apertura = $this->apertura();
            if($apertura){

            $cierres = CierreCaja::where('usuario_id',$usuario)->paginate(5);
             return view('admin.cierre.index')->with([
            'cierres'=> $cierres
            ]);

            }
             $notification = array(
            'message' => '¡Debe iniciar apertura de caja antes de cerrarla!',
            'alert-type' => 'error'
        );
        
        return \Redirect::to('/apertura/create')->with($notification);

            
            
           
        }

         $cierres = CierreCaja::paginate(5);
             return view('admin.cierre.indexes')->with([
            'cierres'=> $cierres
            ]);  
           
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         $apertura = $this->apertura();
            if($apertura){

            $cajas = Caja::all();
             return view('admin.cierre.create')->with([
            'cajas'=> $cajas
            ]);

            }
             $notification = array(
            'message' => '¡Debe iniciar apertura de caja antes de cerrarla!',
            'alert-type' => 'error'
        );
        
        return \Redirect::to('/apertura/create')->with($notification);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cierre = CierreCaja::create($request->all());

        \DB::table('apertura_caja')
        ->update(
            ['status' => '0']
        );

        $mensaje = "Cierre de caja satisfactorio.";  
					return \Redirect::to('/cierre')->with(compact('mensaje'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
