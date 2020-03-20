<?php

namespace App\Http\Controllers;
use App\Models\TasaDolar;
use Illuminate\Http\Request;

class TasaDolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasas = TasaDolar::get();
        return view('admin.tasa.index', compact('tasas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tasa = TasaDolar::create($request->all());
        $notification = array(
            'message' => '¡La tasa ha sido generada!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/tasa')->with($notification);
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
        $tasas= TasaDolar::find($id);
        return view('admin.tasa.edit',compact('tasas'));
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
        $tasa = TasaDolar::find($id);
        $tasa->update($request->all());
        

        $notification = array(
            'message' => '¡Asistencia Actualizado!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/tasa')->with($notification);
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
