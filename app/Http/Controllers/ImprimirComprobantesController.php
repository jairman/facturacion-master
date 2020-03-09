<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comprobante;

class ImprimirComprobantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_imp = 345;
        $fecha = "04/07/2018";
        $pdf = app('Fpdf');

        $pdf->AddPage();
       
        $pdf->Ln(1);
        
        $pdf->Image('images/logo/logo-imagen.png',10,5,40,25,'PNG');
      
        $pdf->SetY(20);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(170,5,utf8_decode('COMPROBANTES GENERADOS'),0,1,'C');

        $comprobantes = Comprobante::orderby('fecha_emision', 'desc')->get();

        foreach ($comprobantes as $key => $value) {
        
      

         //titulos encabezado
         $pdf->SetXY(10, 40);
         $pdf->SetFont('Arial','B',8);
         $pdf->SetXY(10, 45);
         $pdf->SetFont('Arial','B',6);
         $pdf->Cell(10,5,utf8_decode("ID"),1,1,'L');
         $pdf->SetXY(20, 45);
         $pdf->Cell(30,5,utf8_decode("TIPO DE COMPROBANTE:"),1,1,'L');
         $pdf->SetXY(50, 45);
         $pdf->Cell(20,5,utf8_decode("TIPO DE PAGO:"),1,1,'L');
         $pdf->SetXY(70, 45);
         $pdf->Cell(25,5,utf8_decode("TIPO DE MONEDA:"),1,1,'L');
         $pdf->SetXY(95, 45);
         $pdf->Cell(25,5,utf8_decode("CLIENTE:"),1,1,'L');
         $pdf->SetXY(120, 45);
         $pdf->Cell(20,5,utf8_decode("N° DE CAJA:"),1,1,'L');
         $pdf->SetXY(140, 45);
         $pdf->Cell(15,5,utf8_decode("SUB-TOTAL:"),1,1,'L');
         $pdf->SetXY(155, 45);
         $pdf->Cell(20,5,utf8_decode("IVA:"),1,1,'L');
         $pdf->SetXY(175, 45);
         $pdf->Cell(20,5,utf8_decode("TOTAL:"),1,1,'L');


         // datos del encabezado
         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(10, 50);
         $pdf->Cell(10,5,utf8_decode($value->id),1,1,'C');
         $pdf->SetXY(20, 50);
         $pdf->Cell(30,5,utf8_decode($value->tipo->nombre),1,1,'C');
         $pdf->SetXY(50, 50);
         $pdf->Cell(20,5,utf8_decode(($value->tipoPago->nb_tipo_pago)),1,1,'C');
         $pdf->SetXY(70, 50);
         $pdf->Cell(25,5,utf8_decode(($value->moneda->nombre)),1,1,'C');
         $pdf->SetXY(95, 50);
         $pdf->Cell(25,5,utf8_decode(($value->cliente->nombre)),1,1,'C');
         $pdf->SetXY(120, 50);
         $pdf->Cell(20,5,utf8_decode(($value->caja_id)),1,1,'C');
         $pdf->SetXY(140, 50);
         $pdf->Cell(15,5,utf8_decode(($value->subTotal)),1,1,'C');
         $pdf->SetXY(155, 50);
         $pdf->Cell(20,5,utf8_decode(($value->iva)),1,1,'C');
         $pdf->SetXY(175, 50);
         $pdf->Cell(20,5,utf8_decode(($value->total)),1,1,'C');
          }
        
        //save file
        $headers=['Content-Type'=>'application/pdf'];
        return Response($pdf->Output(), 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comprobantes = Comprobante::find($id);   
        foreach ($comprobantes as $key => $value) {

    $id_imp = 345;
        $fecha = "04/07/2018";
        $pdf = app('Fpdf');

        $pdf->AddPage();
       
        $pdf->Ln(1);
        
        $pdf->Image('images/logo/logo-imagen.png',10,5,40,25,'PNG');
      
        $pdf->SetY(20);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(170,5,utf8_decode('COMPROBANTES GENERADOS'),0,1,'C');

        $comprobantes = Comprobante::orderby('fecha_emision', 'desc')->get();

        foreach ($comprobantes as $key => $value) {
        
      

         //titulos encabezado
         $pdf->SetXY(10, 40);
         $pdf->SetFont('Arial','B',8);
         $pdf->SetXY(10, 45);
         $pdf->SetFont('Arial','B',6);
         $pdf->Cell(10,5,utf8_decode("ID"),1,1,'L');
         $pdf->SetXY(20, 45);
         $pdf->Cell(30,5,utf8_decode("TIPO DE COMPROBANTE:"),1,1,'L');
         $pdf->SetXY(50, 45);
         $pdf->Cell(20,5,utf8_decode("TIPO DE PAGO:"),1,1,'L');
         $pdf->SetXY(70, 45);
         $pdf->Cell(25,5,utf8_decode("TIPO DE MONEDA:"),1,1,'L');
         $pdf->SetXY(95, 45);
         $pdf->Cell(25,5,utf8_decode("CLIENTE:"),1,1,'L');
         $pdf->SetXY(120, 45);
         $pdf->Cell(20,5,utf8_decode("N° DE CAJA:"),1,1,'L');
         $pdf->SetXY(140, 45);
         $pdf->Cell(15,5,utf8_decode("SUB-TOTAL:"),1,1,'L');
         $pdf->SetXY(155, 45);
         $pdf->Cell(20,5,utf8_decode("IVA:"),1,1,'L');
         $pdf->SetXY(175, 45);
         $pdf->Cell(20,5,utf8_decode("TOTAL:"),1,1,'L');


         // datos del encabezado
         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(10, 50);
         $pdf->Cell(10,5,utf8_decode($value->id),1,1,'C');
         $pdf->SetXY(20, 50);
         $pdf->Cell(30,5,utf8_decode($value->tipo->nombre),1,1,'C');
         $pdf->SetXY(50, 50);
         $pdf->Cell(20,5,utf8_decode(($value->tipoPago->nb_tipo_pago)),1,1,'C');
         $pdf->SetXY(70, 50);
         $pdf->Cell(25,5,utf8_decode(($value->moneda->nombre)),1,1,'C');
         $pdf->SetXY(95, 50);
         $pdf->Cell(25,5,utf8_decode(($value->cliente->nombre)),1,1,'C');
         $pdf->SetXY(120, 50);
         $pdf->Cell(20,5,utf8_decode(($value->caja_id)),1,1,'C');
         $pdf->SetXY(140, 50);
         $pdf->Cell(15,5,utf8_decode(($value->subTotal)),1,1,'C');
         $pdf->SetXY(155, 50);
         $pdf->Cell(20,5,utf8_decode(($value->iva)),1,1,'C');
         $pdf->SetXY(175, 50);
         $pdf->Cell(20,5,utf8_decode(($value->total)),1,1,'C');
          }
        
        //save file
        $headers=['Content-Type'=>'application/pdf'];
        return Response($pdf->Output(), 200, $headers);
           
        }
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
