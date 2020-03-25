<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Pago;



class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleados::get();

        foreach ($empleados as $key => $empleado) {
            
            $pagos = Pago::where('usuario_id', $empleado->usuario_id)->get();

            
        }





        $fecha = "04/07/2018";
        
        $pdf= app('FPDF');

        $pdf->AddPage();
       
        $pdf->Ln(1);

        //dd($comprobantes);
       

              
        //$pdf->Image('images/logo/logo-imagen.png',10,5,40,25,'PNG');
         $pdf->SetY(10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(60,5,utf8_decode("BOCOEXPRESS" ),0,1,'L');
         $pdf->SetXY(150,10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(60,5,utf8_decode("Fecha: ".date("d/m/Y")),0,1,'L');
         

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
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(190,5,utf8_decode("Recibos cancelados"),0,1,'C');
        
          $pdf->SetFont('Arial','B',10);
          $pdf->Ln(6);
          $pdf->Cell(170,6,"Datos de los empleados",1,0,'C');
          $pdf->Ln(6);
          $pdf->SetX(10);
          $pdf->Cell(40,6,"Nombres",1,0,'C');
          $pdf->Cell(30,6,"Apellidos",1,0,'C');
          $pdf->Cell(30,6,utf8_decode("Cédula"),1,0,'C');
          $pdf->Cell(30,6,utf8_decode("Teléfono"),1,0,'C');
          $pdf->Cell(40,6,"Fecha de pago",1,0,'C');

          $sumaSueldoBase = 0;
          $sumaDeducciones = 0;
          $sumaBonos = 0;
          $total_sumaTotal = 0;
          

        $sueldoBase = \DB::table('pagos')
                ->select('nu_sueldo_base', \DB::raw('SUM(nu_sueldo_base) as total_sueldo_base'))
                ->groupBy('nu_sueldo_base')
                //->havingRaw('SUM(nu_sueldo_base) > ?', [2500])
                ->get();

        $deducciones = \DB::table('pagos')
                    ->whereIn('tipo_pago_empleado_id', [3])
                    ->selectRaw('SUM(nu_cantidad_tipo_pago) as total_deduccion' )
                    ->get();

        $bonos = \DB::table('pagos')
                    ->whereIn('tipo_pago_empleado_id', [1])
                    ->selectRaw('SUM(nu_cantidad_tipo_pago) as total_bonos' )
                    ->get();

        //dd($deducciones);

                foreach ($sueldoBase as $key => $value) {

                    foreach ($deducciones as $key => $deduccion) {

                      

                       $sumaDeduccion = $value->total_sueldo_base - $deduccion->total_deduccion;
                    }

                    foreach ($bonos as $key => $bono) {

                        $sumaBono = $bono->total_bonos;

                        //dd($sumaBono);
                    }

                 

                
                }
       

        

          foreach ($pagos as $key => $pago) {


          $pdf->Ln(6);
          $pdf->Cell(40,6,utf8_decode($pago->empleado->nb_nombre),1,0,'C');
          $pdf->Cell(30,6,utf8_decode($pago->empleado->nb_apellido),1,0,'C');
          $pdf->Cell(30,6,$pago->empleado->nu_cedula,1,0,'C');
          $pdf->Cell(30,6,$pago->empleado->telefono,1,0,'C');
          $pdf->Cell(40,6,date('d-m-Y', strtotime($pago->fecha)),1,0,'C');

          $sumaSueldoBase = $pago->nu_sueldo_base *  $pago->count();
          $sumaDeducciones =  $sumaDeduccion;
          $sumaBonos = $sumaBono;
          $total_sumaTotal = $sumaSueldoBase + $sumaBonos + $sumaDeducciones;

          //dd($total_sumaTotal);
          
  }
           $pdf->Ln(10);
           $pdf->Cell(80,6,"Sueldo base neto:",1,0);
           $pdf->Cell(30,6,number_format($sumaSueldoBase,2,",","."),1,0);

           $pdf->Ln(6);
           $pdf->Cell(80,6,"Total en deducciones",1,0);
           $pdf->Cell(30,6,number_format($sumaDeducciones,2,",","."),1,0);

           $pdf->Ln(6);
           $pdf->Cell(80,6,"Total de otros pagos adicionales:",1,0);
           $pdf->Cell(30,6,number_format($sumaBonos,2,",","."),1,0);
           $pdf->Ln(6);
           $pdf->Cell(80,6,"Total pagado:",1,0);
           $pdf->Cell(30,6,number_format($total_sumaTotal,2,",","."),1,0);

          

     
        
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
