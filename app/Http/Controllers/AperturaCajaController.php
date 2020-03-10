<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\AperturaCaja;
use App\Models\User;
use App\Models\Caja;

class AperturaCajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public  function usuario(){

        $usuario_id= \Auth::user()->id;
            
         return $usuario_id;
    }


    public function index()
    {
        $usuario= \Auth::user()->id;

        $id = $this->usuario();
        
        if($id <> 1 ){

            $aperturas = AperturaCaja::where('usuario_id',$usuario)->paginate(5);
             return view('admin.apertura.index')->with([
            'aperturas'=> $aperturas
            ]);
        }

         $aperturas= AperturaCaja::paginate(5);
             return view('admin.apertura.index')->with([
            'aperturas'=> $aperturas
            ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cajas = Caja::all();
        return view('admin.apertura.create')->with(compact('cajas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        
        $apertura = AperturaCaja::create($request->all());
        $notification = array(
            'message' => '¡Apertura de caja generada!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/apertura')->with($notification);
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
