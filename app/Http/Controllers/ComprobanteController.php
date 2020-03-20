<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\facades\SistemaFactura;
use App\Models\TipoComprobante;
use App\Models\Notificacion;
use App\Models\LineaProducto;
use App\Models\LineaCaja;
use App\Models\Cliente;
use App\Models\Comprobante;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\Recibo;
use App\Models\Moneda;
use App\Models\TipoPago;
use App\Models\AperturaCaja;
use App\Models\TasaDolar;

use Auth;

class ComprobanteController extends Controller
{
	

	    public function __construct()
    {
        $this->middleware('auth');
    }





	public function index(Request $request)
	{
		$monedas = Moneda::all();

		$fechaInicio = $request->fechaInicio;
		$fechaFin = $request->fechaFin;
		$tipos_comprobante = TipoComprobante::all();
		$tipos_pago = TipoPago::all();
		if($fechaFin && $fechaInicio){
			$comprobantes = Comprobante::where('fecha_emision', '>=', $fechaInicio)
					->where('fecha_emision', '<=', $fechaFin)
					->orderby('fecha_emision', 'desc')
					->paginate(20);            
		}else{
			$comprobantes = Comprobante::orderby('fecha_emision', 'desc')->paginate(5);
		}
		return view('admin.comprobantes.index')->with(compact('comprobantes', 'monedas', 'tipos_comprobante','tipos_pago'));            
	}

	public function consultas(Request $request)
	{
		$facturas = Comprobante::all();
		$monedas = Moneda::all();
		return view('admin.comprobantes.consultas')->with(compact('facturas', 'monedas'));
	}


	public function apertura()
    {
		
		$carbon = new \Carbon\Carbon();
		$date =$carbon->format('Y-m-d');
	
	
		$usuario= Auth::user()->id;
		$apertura=AperturaCaja::where('apertura_caja.status','=','1')
		->where('usuario_id',$usuario )
		->where('fecha_emision',$date)
		->get();
	

        return ( count($apertura) > 0) ? true : false ;
    }

    public function tasa()
    {
		
		$carbon = new \Carbon\Carbon();
		$date =$carbon->format('Y-m-d');
	
	
		$usuario= Auth::user()->id;
		$tasa=TasaDolar::where('fe_tasa',$date)
		->get();
	

        return ( count($tasa) > 0) ? true : false ;
    }

	public function nuevo()
	{

		$apertura = $this->apertura();
		$tasa = $this->tasa();
		
		if ($apertura) {
			
			//dd(($tasa));

			if ($tasa) {

			$carbon = new \Carbon\Carbon();
			$date =$carbon->format('Y-m-d');
			$usuario= Auth::user()->id;
			/*******************************************************/
			$apertura=AperturaCaja::where('apertura_caja.status','=','1')
			->where('usuario_id',$usuario )
			->where('fecha_emision',$date)
			->get();
			$productos = Producto::all();
			$tipos_pago = TipoPago::all();
			$monedas = Moneda::all();
			$tasa= TasaDolar::first();
	
			$tipos_comprobante = TipoComprobante::all();
			return view('admin.comprobantes.nuevo')->with(compact('apertura','productos', 'monedas', 'tipos_comprobante','tipos_pago','tasa'));		
			}
			$notification = array(
            'message' => '¡Debes agregar la tasa del dolar al dia para iniciar proceso de venta!',
            'alert-type' => 'error'
        );
        
        return \Redirect::to('/tasa/create')->with($notification);



			
		}
		
		$notification = array(
            'message' => '¡Debe iniciar apertura de caja antes de generar un comprobante de venta!',
            'alert-type' => 'error'
        );
        
        return \Redirect::to('/apertura/create')->with($notification);
		
		
	}

	public function guardar(Request $request)
	{	
		//dd($request);
		$tipo_comprobante = $request->tipo_comprobante;		
		// 1- Venta al contado
		// 2- Devolución al contado
		// 3- Factura de venta a créditos

		//TODO: Asociar tipo de comprobante
		if($tipo_comprobante == 1 || $tipo_comprobante == 2 || $tipo_comprobante == 3){
			$articulos = json_decode($request->listadoArticulos);
			$moneda = Moneda::find($request->moneda);
			$cliente = Cliente::find($request->cliente_id);			
			$comprobante = new Comprobante();

			$comprobante->serie = $request->serie;
			$comprobante->numero = $request->numero;        
			$comprobante->fecha_emision = $request->fecha_emision;
			$comprobante->tipo_pago_id = $request->tipo_pago_id;
			$comprobante->caja_id = $request->caja_id;
			$comprobante->usuario_id = $request->usuario_id;

			$comprobante->descripcion_1 = $request->descripcion_1;
			$comprobante->descripcion_2 = $request->descripcion_2;
			$comprobante->descripcion_3 = $request->descripcion_3;

			if(is_numeric($request->cotizacion)){
				$comprobante->cotizacion = $request->cotizacion;
			}
			
			$comprobante->moneda()->associate($moneda);

			if($cliente != null){
				$comprobante->cliente()->associate($cliente);
				$comprobante->nombre_cliente = $cliente->nombre . " " . $cliente->apellido;
				$comprobante->rif = $cliente->rif;            
			}else{
				if($tipo_comprobante == 3){
					$alerta = "Debe ingresar un cliente registrado para emitir una factura de venta a crédito.";
					return Redirect::back()->with(compact('alerta'));
				}
				$comprobante->nombre_cliente = $request->cliente;
				$comprobante->rif = $request->rif;
			}
			$comprobante->direccion = $request->direccion;
			$comprobante->tipo()->associate($request->tipo_comprobante);

			$comprobante->save();
			$ok = true;

			for ($i=0; $i < count($articulos); $i++) {
				$producto = Producto::BuscarPorCodigo($articulos[$i]->codigo)->first();
				$linea = $articulos[$i];
				//dd($linea, $producto);
				if($producto->stock >= $linea->cantidad){
					$lineaProducto = new LineaProducto();
					$lineaProducto->comprobante()->associate($comprobante);
					$lineaProducto->producto()->associate($producto);
					$lineaProducto->usuario()->associate(Auth::user());

					$lineaCaja = new LineaCaja();
					$lineaCaja->comprobante()->associate($comprobante);
					$lineaCaja->producto()->associate($producto);
					$lineaCaja->usuario()->associate(Auth::user());

					// Checkea si es devolución
					if($comprobante->tipo->id == 2){
						$linea->cantidad *= -1;						
					}

					$producto->stock -= $linea->cantidad;
					$lineaProducto->stock = $producto->stock;
					
					$lineaProducto->precioUnitario = $linea->precio;
					$lineaProducto->cantidad = $linea->cantidad;

					//$lineaProducto->subTotal = $producto->precio * $linea->cantidad;
					$lineaProducto->subTotal = $articulos[$i]->precio * $linea->cantidad;
					// Para los iva accede al tipo de iva que tenga el producto.
					// Próxima versión debería poer modificarse si se quiere.
					$lineaProducto->iva = $lineaProducto->subTotal * ($producto->iva->tasa / 100);
					
					$lineaProducto->total = $lineaProducto->subTotal + $lineaProducto->iva;

					$lineaProducto->fecha = date("Y-m-d H:i:s");

					$comprobante->iva += $lineaProducto->iva;
					$comprobante->subTotal += $lineaProducto->subTotal;
					$moneda_simbolo = $comprobante->moneda->simbolo;

					$lineaProducto->descripcion = "x $lineaProducto->cantidad  $producto->nombre  -  TOTAL $moneda_simbolo $lineaProducto->total";

				    /*************************************************************/
				    ///////////////////////Movimiento de caja/////////////////////    /*************************************************************/
					$producto->stock -= $linea->cantidad;
					$lineaProducto->stock = $producto->stock;
					
					$lineaProducto->precioUnitario = $linea->precio;
					$lineaProducto->cantidad = $linea->cantidad;

					//$lineaProducto->subTotal = $producto->precio * $linea->cantidad;
					$lineaProducto->subTotal = $articulos[$i]->precio * $linea->cantidad;
					// Para los iva accede al tipo de iva que tenga el producto.
					// Próxima versión debería poer modificarse si se quiere.
					$lineaProducto->iva = $lineaProducto->subTotal * ($producto->iva->tasa / 100);
					
					$lineaProducto->total = $lineaProducto->subTotal + $lineaProducto->iva;

					$lineaProducto->fecha = date("Y-m-d H:i:s");

					$comprobante->iva += $lineaCaja->iva;
					$comprobante->subTotal += $lineaCaja->subTotal;
					$moneda_simbolo = $comprobante->moneda->simbolo;

					$lineaCaja->descripcion = "x $lineaProducto->cantidad  $producto->nombre  -  TOTAL $moneda_simbolo $lineaProducto->total";                
					
					$lineaProducto->save();
					$producto->save();
					$lineaCaja->save();
				}
				$comprobante->total = $comprobante->iva + $comprobante->subTotal;				
				$comprobante->save();								

				// Verificamos stock restante de producto para ver si notificar				
				if($producto->stock_minimo_notificar && $producto->stock <= $producto->stock_minimo_valor){
					$titulo = "Stock mínimo alcanzado";
					$texto = "Quedan " . $producto->stock . " unidad/es de " . $producto->nombre; 
					$link_texto = "Ir al producto";
					$link = "/productos/detalle/" . $producto->codigo;
					Notificacion::crearNotificacion($titulo, $texto, $link, $link_texto);
				}
			}


			// Verificamos si es una factura
			if($comprobante->tipo->id == 3){
				$fecha_vencimiento = $request->fecha_vencimiento;
				$deuda_original = $comprobante->total;


				if($request->pago_inicial)
					$deuda_actual = $comprobante->total - $request->pago_inicial;
				else
					$deuda_actual = $comprobante->total;

				$plazo = $request->plazo;

				$factura = SistemaFactura::getInstancia()->ingresarFactura($comprobante, $fecha_vencimiento, $deuda_original, $deuda_actual, $plazo);				
			}

			$mensaje = "El comprobante fue cargado correctamente.";        
			return Redirect::to('comprobantes/detalle/' . $comprobante->id)->with(compact('mensaje'));            
		}
	}

	public function detalle(Request $request, $comprobante_id)
	{
		$comprobante = Comprobante::find($comprobante_id);
		
		return view('admin.comprobantes.detalle')->with(compact('comprobante'));
	}

	public function imprimir(Request $request, $comprobante_id)
	{
		$comprobante = Comprobante::find($comprobante_id);        
		
		return view('admin.comprobantes.imprimir')->with(compact('comprobante'));
	}

	public function vencimientos(Request $request){
		$fecha = $request->fecha;
		$fecha_fin = $request->fecha_fin;	
		$cliente_id = $request->cliente_id;

		$vencimientos = Factura::where('facturas.id','>','0');
		
		if($cliente_id != null){
			$vencimientos->filtrarPorCliente($cliente_id, 'and');
		}
		if($fecha){
			$vencimientos->filtrarPorFecha($request->fecha, 'and');			
		}
		if(!$request->mostrar_facturas_pagas){
			$vencimientos = $vencimientos->where('deuda_actual', '>', 0, 'and');
		}
		if($request->ocultar_facturas_vencidas){
			$vencimientos = $vencimientos->where('fecha_vencimiento', '>', date('Y-m-d'), 'and');
		}
		
		$vencimientos = $vencimientos->orderby('fecha_vencimiento')
						->paginate(5);
				
		return view('admin.facturas.vencimientos')->with(compact('vencimientos'));
	}

	public function nuevoRecibo($cliente_id){
		$cliente = Cliente::where('id', $cliente_id)->first();
		$monedas = Moneda::all();		
		if($cliente){
			$facturas = Factura::buscarPorCliente($cliente->id)
					->where('deuda_actual', '>', 0)
					->orderby('fecha_vencimiento')

					->paginate(5);					
			$total_adeudado = 0;
			$total_atrasado = 0;
			for ($i=0; $i < sizeof($facturas) ; $i++) {
				$total_adeudado += $facturas[$i]->deuda_actual;

				$hoy = time();
				$fecha_vencimiento = strtotime($facturas[$i]->fecha_vencimiento);
				$date_diff = $fecha_vencimiento - $hoy;
				$dias_restantes = round($date_diff / (60 * 60 * 24));

				if($dias_restantes < 0)
					$total_atrasado += $facturas[$i]->deuda_actual;
			}
			return view('admin.facturas.nuevo_recibo')->with(compact('cliente', 'facturas', 'monedas', 'total_atrasado', 'total_adeudado'));
		}else{
			$error = "No se encontró ningún cliente para el ID especificado.";
			return Redirect::to('/comprobantes/vencimientos')->with(compact('error'));
		}
	}

	public function guardarRecibo(Request $request){		
		$facturas = json_decode($request->facturas_seleccionadas);		

		$usuario = Auth::user();
		$moneda = Moneda::find($request->moneda);
		$cliente = Cliente::find($request->cliente);
		
		$fecha = $request->fecha;
		$cotizacion = $request->cotizacion;
		$monto = $request->monto;		

		try{
			$recibo = new Recibo();
			// Entidades asociadas
			$recibo->moneda()->associate($moneda);		
			$recibo->usuario()->associate($usuario);		
			$recibo->cliente()->associate($cliente);
			
			$recibo->fecha = date("Y-m-d H:i:s");
			$recibo->monto = $monto;
			
			if($cotizacion)
				$recibo->cotizacion = $request->cotizacion;
			
			// Auxiliar para ir cancelando las facturas
			$saldo_aux = $recibo->monto;			
			// factura_id, deuda_actual, a_pagar, saldo_final
			for ($i=0; $i < count($facturas); $i++) {				
				if($saldo_aux > 0){
					$factura = Factura::find($facturas[$i]->factura_id);
					if($factura){
						if($factura->deuda_actual > 0){
							// PAGO PARCIAL O JUSTO
							if($factura->deuda_actual >= $saldo_aux){
								// variables temporales
								$deuda_inicial = $factura->deuda_actual;
								$deuda_final = round($factura->deuda_actual - $saldo_aux);
								
								// Asociamos recibo con todos sus datos a la factura.
								$factura->recibos()->save($recibo, ['deuda_inicial' => $deuda_inicial, 'deuda_final' => $deuda_final]);

								// Una vez hecho esto, actualizamos deuda de la factura
								$factura->deuda_actual = $deuda_final;
								
								$factura->save();
								$saldo_aux = 0;
							// ESTOY PAGANDO DE MAS
							}else{
								// variables temporales
								$deuda_inicial = $factura->deuda_actual;
								$deuda_final = 0;								

								// Asociamos recibo con todos sus datos a la factura.
								$factura->recibos()->save($recibo, ['deuda_inicial' => $deuda_inicial, 'deuda_final' => $deuda_final]);

								// Restamos al saldo actual lo que pagamos
								$saldo_aux -= $deuda_inicial;
								$factura->deuda_actual = 0;
								$factura->save();
							}							
						}
					}
				}				
			}
			$mensaje = "El recibo fue ingresado correctamente.";
			return Redirect::to('/comprobantes/recibos/nuevo/'.$cliente->id)->with(compact('mensaje'));
		} catch ( \Illuminate\Database\QueryException $e) {
			dd($e);
			return Redirect::back();
		}
	}


	public function excel()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        Excel::create('Comprobantes', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
                //otra opción -> $products = Product::select('name')->get();
                $comprobantes = Comprobante::all();                
                $sheet->fromArray($comprobantes);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }
}
