<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comprobante;
use App\Models\LineaProducto;

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


        $fecha = "04/07/2018";
        $pdf= app('Fpdf');

        $pdf->AddPage();
       
        $pdf->Ln(1);

        $comprobantes = Comprobante::orderby('fecha_emision', 'desc')->get();
        //dd($comprobantes);
        foreach ($comprobantes as $key => $value) {
              
        //$pdf->Image('images/logo/logo-imagen.png',10,5,40,25,'PNG');
         $pdf->SetY(10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(60,5,utf8_decode("BOCOEXPRESS" ),0,1,'L');
         $pdf->SetXY(150,10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(60,5,utf8_decode("Fecha: ".date("d/m/Y")),0,1,'L');
         $pdf->SetXY(150,15);
         $pdf->Cell(60,5,utf8_decode("N° Factura: ").($id),0,1,'L');

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
         $pdf->Cell(190,5,utf8_decode("Nombre y Apellido: ".$value->cliente->nombre." ".$value->cliente->apellido),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Dirección: ".$value->cliente->direccion),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Cédula: ".$value->cliente->documento),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Teléfono: ".$value->cliente->telefono),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Rif: ".$value->cliente->rif),0,1,'L');
        }

         $desgloce = LineaProducto::where('comprobante_id',$id)->get();

          $pdf->Ln(10);
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(190,5,utf8_decode("Factura de Compra"),0,1,'C');
        
          $pdf->SetFont('Arial','B',10);
          $pdf->Ln(6);
          $pdf->SetX(10);
          $pdf->Cell(20,6,"Cantidad",1,0,'C');
          $pdf->Cell(100,6,"Descripcion",1,0,'C');
          $pdf->Cell(30,6,"Precio Unitario",1,0,'C');
          $pdf->Cell(30,6,"Monto Total",1,0,'C');

          $sumaTotal = 0;
          $total_sumaTotal = 0;
          $sub_total_iva = 0;
          $total_iva = 0;
          $sumaPago = 0;



            foreach ($desgloce as $key => $value) {

          $pdf->Ln(6);
          $pdf->Cell(20,6,$value->cantidad,1,0,'C');
          $pdf->Cell(100,6,$value->producto->nombre,1,0,'C');
          $pdf->Cell(30,6,$value->producto->precio,1,0,'C');

           $sumaTotal =($value->cantidad * $value->producto->precio);

          

           

          $pdf->Cell(30,6,number_format($sumaTotal,2,",","."),1,0,'C');

            $total_sumaTotal +=$sumaTotal;
            $total_iva +=$value->iva;

            $total = ( $total_sumaTotal + $total_iva );



          }
       $pdf->Ln(6);
       $pdf->Cell(150,6,"Total neto:",1,0,'C');
       $pdf->Cell(30,6,number_format($total_sumaTotal,2,",","."),1,0,'C');


       $pdf->Ln(6);
       $pdf->Cell(150,6,"Total Iva:",1,0,'C');
       $pdf->Cell(30,6,number_format($total_iva,2,",","."),1,0,'C');

       $pdf->Ln(6);
              $pdf->Cell(150,6,"Total a pagar:",1,0,'C');
       $pdf->Cell(30,6,number_format($total,2,",","."),1,0,'C');

          
        
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
