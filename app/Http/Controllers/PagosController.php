<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\ModoPagos;
use App\Models\TipoPagoEmpleados;
use App\Models\Pago;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
        $pagos     = Pago::get();
        
        return view ('admin.pagos.index',
                     compact('pagos'
                         ));

            
          
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos     = TipoPagoEmpleados::all();
        $modos     = ModoPagos::all();
        $empleados = Empleados::all();


        return view('admin.pagos.create', compact('tipos','modos','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pagos = new Pago();

        $pagos->empleado_id           = $request->empleado_id;
        $pagos->usuario_id            = $request->usuario_id;        
        $pagos->tipo_pago_empleado_id = $request->tipo_pago_empleado_id;
        $pagos->modo_pagos_id         = $request->modo_pagos_id;
        $pagos->nu_sueldo_base        = $request->nu_sueldo_base;
        $pagos->nu_cantidad_tipo_pago = $request->nu_cantidad_tipo_pago;
        $pagos->tx_descripcion        = $request->tx_descripcion;
        $pagos->fecha                 = $request->fecha;

        if ($request->tipo_pago_empleado_id == 2){

        $pagos->total                 = $request->nu_sueldo_base;

        $pagos->save();

        $notification = array(
            'message' => '¡Pago generado satisfactoriamente!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/pagos/empleado')->with($notification);


        }
        elseif ($request->tipo_pago_empleado_id == 3) {

        $pagos->total                 = $request->nu_sueldo_base - $request->nu_cantidad_tipo_pago;

        $pagos->save();

        $notification = array(
            'message' => '¡Pago generado satisfactoriamente!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/pagos/empleado')->with($notification);
 

        }
         elseif ($request->tipo_pago_empleado_id == 1) {

        $pagos->total                 = $request->nu_sueldo_base + $request->nu_cantidad_tipo_pago;

        $pagos->save();

        $notification = array(
            'message' => '¡Pago generado satisfactoriamente!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/pagos/empleado')->with($notification);
 

        }
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagos     = Pago::find($id);
        return view ('admin.pagos.show', compact('pagos')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagos     = Pago::find($id);
        $tipos     = TipoPagoEmpleados::all();
        $modos     = ModoPagos::all();
        $empleados = Empleados::all();
        return view ('admin.pagos.edit', compact('pagos','tipos','modos','empleados'));
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
         $pagos = Pago::find($id);

        $pagos->empleado_id           = $request->empleado_id;
        $pagos->usuario_id            = $request->usuario_id;        
        $pagos->tipo_pago_empleado_id = $request->tipo_pago_empleado_id;
        $pagos->modo_pagos_id         = $request->modo_pagos_id;
        $pagos->nu_sueldo_base        = $request->nu_sueldo_base;
        $pagos->nu_cantidad_tipo_pago = $request->nu_cantidad_tipo_pago;
        $pagos->tx_descripcion        = $request->tx_descripcion;
        $pagos->fecha                 = $request->fecha;

        if ($request->tipo_pago_empleado_id == 2){

        $pagos->total                 = $request->nu_sueldo_base;

        $pagos->update($request->all());

        $notification = array(
            'message' => '¡Pago generado satisfactoriamente!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/pagos/empleado')->with($notification);


        }
        elseif ($request->tipo_pago_empleado_id == 3) {

        $pagos->total                 = $request->nu_sueldo_base - $request->nu_cantidad_tipo_pago;

        $pagos->update($request->all());

        $notification = array(
            'message' => '¡Pago generado satisfactoriamente!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/pagos/empleado')->with($notification);
 

        }
         elseif ($request->tipo_pago_empleado_id == 1) {

        $pagos->total                 = $request->nu_sueldo_base + $request->nu_cantidad_tipo_pago;

        $pagos->update($request->all());

        $notification = array(
            'message' => '¡Pago generado satisfactoriamente!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/pagos/empleado')->with($notification);
 

        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imprimir($id)
    {
        $fecha = "04/07/2018";
        
        $pdf= app('FPDF');

        $pdf->AddPage();
       
        $pdf->Ln(1);

        $pago = Pago::find($id);
        
       
        //dd($comprobantes);
       

              
        //$pdf->Image('images/logo/logo-imagen.png',10,5,40,25,'PNG');
         $pdf->SetY(10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(60,5,utf8_decode("BOCOEXPRESS" ),0,1,'L');
         $pdf->SetXY(150,10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(60,5,utf8_decode("Fecha: ".date("d/m/Y")),0,1,'L');
         $pdf->SetXY(150,15);
         $pdf->Cell(60,5,utf8_decode("N° de Recibo: ").($id),0,1,'L');

         $pdf->Ln(1);
         $pdf->SetFont('Arial','B',10);
         $pdf->Cell(190,5,utf8_decode("RIF.: V-17829298-2"),0,1,'L');

         $pdf->SetFont('Arial','B',10);
        //$pdf->Ln(1);
         $pdf->Cell(190,5,utf8_decode("Direccion*******************"),0,1,'L');
        //$pdf->Ln(1);
         $pdf->Cell(190,5,utf8_decode("Direccion********************"),0,1,'L');
         //$pdf->Ln(1);
         $pdf->Cell(190,5,utf8_decode("Telefonos: ********* / **********"),0,1,'L');

         $pdf->Ln(10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(190,5,utf8_decode("Nombre y Apellido: ".$pago->empleado->nb_nombre." ".$pago->empleado->nb_apellido),0,1,'L');
        $pdf->Cell(190,5,utf8_decode("Cédula: ".$pago->empleado->nu_cedula),0,1,'L'); 
         $pdf->Cell(190,5,utf8_decode("Fecha de ingreso: ".date('d-m-Y', strtotime($pago->empleado->fe_ingreso))),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Profesion: ".$pago->empleado->nb_profesion),0,1,'L');
        

          $pdf->Ln(10);
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(190,5,utf8_decode("Recibo de pago"),0,1,'C');
        
          $pdf->SetFont('Arial','B',10);
          $pdf->Ln(6);
          $pdf->SetX(10);
          $pdf->Cell(40,6,"Tipo de pago",1,0,'C');
          $pdf->Cell(30,6,"Fecha",1,0,'C');
          $pdf->Cell(60,6,"Descripcion",1,0,'C');
          $pdf->Ln(6);
          $pdf->Cell(40,6,$pago->tipopago->nb_tipo_pago_empleado,1,0,'C');
          $pdf->Cell(30,6,date('d-m-Y', strtotime($pago->fecha)),1,0,'C');
          $pdf->Cell(60,6,utf8_decode($pago->tx_descripcion),1,0,'C');
          
          $pdf->Ln(10);
          $pdf->SetX(10);
          $pdf->Cell(30,6,"Sueldo base: ",1,0,'C');
          $pdf->Cell(30,6,$pago->nu_sueldo_base,1,0,'C');
          $pdf->Ln(6);
          $pdf->SetX(10);
          $pdf->Cell(30,6,"Monto: ",1,0,'C');
          $pdf->Cell(30,6,$pago->nu_cantidad_tipo_pago,1,0,'C');
          $pdf->Ln(6);
          $pdf->SetX(10);
          $pdf->Cell(30,6,"Total a pagar: ",1,0,'C');
          $pdf->Cell(30,6,$pago->total,1,0,'C');
          

          

     
        
        //save file
        $headers=['Content-Type'=>'application/pdf'];
        return Response($pdf->Output(), 200, $headers);
    }



    public function imprimirdetalle($id)
    {
        $pagos = Pago::where('empleado_id' , '=', $id)->get();
        dd($pagos);
    }
}
