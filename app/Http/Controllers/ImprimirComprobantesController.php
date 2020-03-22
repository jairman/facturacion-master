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
       

        $fecha = "04/07/2018";
        
        $pdf= app('FPDF');

        $pdf->AddPage();
       
        $pdf->Ln(1);

        $comprobantes = Comprobante::find($id);
        
       
        //dd($comprobantes);
       

              
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
         $pdf->Cell(190,5,utf8_decode("Nombre y Apellido: ".$comprobantes->cliente->nombre." ".$comprobantes->cliente->apellido),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Dirección: ".$comprobantes->cliente->direccion),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Cédula: ".$comprobantes->cliente->documento),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Teléfono: ".$comprobantes->cliente->telefono),0,1,'L');
         $pdf->Cell(190,5,utf8_decode("Rif: ".$comprobantes->cliente->rif),0,1,'L');
        
    

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



            foreach ($desgloce as $key => $desgloces) {


            

          $pdf->Ln(6);
          $pdf->Cell(20,6,$desgloces->cantidad,1,0,'C');
          $pdf->Cell(100,6,$desgloces->producto->nombre,1,0,'C');
          $pdf->Cell(30,6,$desgloces->producto->precio,1,0,'C');

           $sumaTotal =($desgloces->cantidad * $desgloces->producto->precio);

          

           

          $pdf->Cell(30,6,number_format($sumaTotal,2,",","."),1,0,'C');

            $total_sumaTotal +=$sumaTotal;
            $total_iva +=$desgloces->iva;

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

           if ($desgloces->comprobante->tipo->nombre == 'Factura de venta crédito') {

                $sql_infor1 = \DB::select(' select "recibos".*, "recibo_facturas"."factura_id" as "pivot_factura_id", "recibo_facturas"."recibo_id" as "pivot_recibo_id", "recibo_facturas"."deuda_inicial" as "pivot_deuda_inicial", "recibo_facturas"."deuda_final" as "pivot_deuda_final" from "recibos" inner join "recibo_facturas" on "recibos"."id" = "recibo_facturas"."recibo_id" where "recibo_facturas"."factura_id" =?',[1]);


          

              $pdf->Ln(12);
              $pdf->SetFont('Arial','B',16);
              $pdf->Cell(190,5,utf8_decode("Recibo de pago"),0,1,'C');



              $pdf->SetFont('Arial','B',10);
              $pdf->Ln(6);
              $pdf->SetX(10);
              $pdf->Cell(30,6,"Deuda Inicial",1,0,'C');
              $pdf->Cell(60,6,"Monto Recibido",1,0,'C');
              $pdf->Cell(30,6,"Deuda Final",1,0,'C');
                foreach ($sql_infor1 as $key => $value) {
                $pdf->Ln(6);
                $pdf->Cell(30,6,number_format($value->pivot_deuda_inicial,2,",","."),1,0,'C');
                $pdf->Cell(60,6,number_format($value->monto,2,",","."),1,0,'C');
                $pdf->Cell(30,6,number_format($value->pivot_deuda_final,2,",","."),1,0,'C');

                
             }


       

          

     }
        
        //save file
        $headers=['Content-Type'=>'application/pdf'];
        return Response($pdf->Output(), 200, $headers);

           
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
