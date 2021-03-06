<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('test');
});
*/

Auth::routes();

Route::middleware(['auth',])->group(function () {

  Route::get('/', 'HomeController@index')->name('home');
  Route::get('user-autocomplete', 'UserController@autocomplete');


  /***************************************************************************
  ***********************************Usuarios*********************************
  ****************************************************************************/


  Route::resource('user', 'UserController');
  Route::resource('logins', 'LoginController');
  Route::resource('permission', 'PermissionController');
  /***************************************************************************
  ***********************************Productos********************************
  ****************************************************************************/
  Route::post('/productos/familiaProductos/nueva', 'ProductoController@nuevaFamiliaProducto');

	Route::get('/productos', 'ProductoController@index');
	Route::get('/productos/movimientos', 'ProductoController@movimientos');

	Route::get('/productos/buscar', 'ProductoController@buscar');		
	
	Route::get('/productos/nuevo', 'ProductoController@nuevo');
	Route::post('/productos/nuevo', 'ProductoController@guardar');
	Route::post('/productos/editar', 'ProductoController@editar');
	Route::post('/productos/borrar', 'ProductoController@borrar');
	Route::get('/productos/detalle/{codigo}', 'ProductoController@detalle');
	Route::post('/productos/{codigo}/configuracion', 'ProductoController@configuracion');
	Route::post('/productos/{codigo}/ModificarStock', 'ProductoController@movimientoModificarStock');
	Route::get('/productos/{codigo}/NotifStockMin', 'ProductoController@NotifStockMin');

	/***************************************************************************
	 ***********************************Comprobantes****************************
	 ****************************************************************************/

	Route::get('/comprobantes', 'ComprobanteController@index');
	Route::get('/comprobantes/consultas', 'ComprobanteController@consultas');
	Route::get('/comprobantes/reportes', 'ReportesController@indexComprobantes');
	Route::get('/comprobantes/nuevo', 'ComprobanteController@nuevo');
	Route::get('/comprobantes/detalle/{facturaId}', 'ComprobanteController@detalle');
	
	Route::post('/comprobantes/guardar', 'ComprobanteController@guardar');
	
	Route::get('/comprobantes/vencimientos', 'ComprobanteController@vencimientos');
	Route::get('/comprobantes/recibos/nuevo/{cliente_id}', 'ComprobanteController@nuevoRecibo');
	Route::post('/comprobantes/recibos/guardar', 'ComprobanteController@guardarRecibo');


	/***************************************************************************
	***********************************Clientes*****************************
	****************************************************************************/

	Route::get('/clientes', 'ClienteController@index');
	Route::get('/clientes/nuevo', 'ClienteController@nuevo');
	Route::post('/clientes/guardar', 'ClienteController@guardar');
	Route::get('/clientes/buscar', 'ClienteController@buscar');
	Route::get('/clientes/detalle/{clienteId}', 'ClienteController@detalle');

	/***************************************************************************
	***********************************Proveedores******************************
	****************************************************************************/

	Route::get('/proveedores/buscar', 'ProveedorController@buscar');
	
	Route::get('/proveedores', 'ProveedorController@index');
	Route::get('/proveedores/nuevo', 'ProveedorController@nuevo');
	Route::post('/proveedores/guardar', 'ProveedorController@guardar');
	Route::get('/proveedores/detalle/{proveedor_id}', 'ProveedorController@detalle');

	Route::get('/indicadores/masVendidos/{mes}', 'IndicadoresController@masVendidos');

	/***************************************************************************
	***********************************Apertura de caja**************************
	****************************************************************************/

	Route::resource('/apertura','AperturaCajaController');

	/***************************************************************************
	***********************************Cierre de caja**************************
	****************************************************************************/

	Route::resource('/cierre','CierreCajaController');

	/***************************************************************************
	********************************* Empleados *******************************
	****************************************************************************/

	Route::resource('/empleados','EmpleadosController');
	/***************************************************************************
	***************************** PDF & EXCEL***********************************
	****************************************************************************/


	Route::get('/comprobantes/excel', 'ComprobanteController@excel')->name('comprobantes.excel');

	Route::get('/comprobantes/imprimir', 'ImprimirComprobantesController@index')->name('comprobantes.imprimir');
	Route::get('/comprobantes/imprimir/{facturaId}', 'ImprimirComprobantesController@show');

	/***************************************************************************
	********************************* Tasa del dólar al día ********************
	****************************************************************************/

	Route::resource('/tasa','TasaDolarController');

	/***************************************************************************
	*******************************Historial de caja ***************************
	****************************************************************************/

	Route::resource('/historial','HistorialCajaController');

	/***************************************************************************
	*******************************Pagos del empleado ***************************
	****************************************************************************/

	Route::resource('/pagos/empleado','PagosController');
	Route::get('/pagos/empleado/{id}/imprimir','PagosController@imprimir');
	Route::resource('/reportes','ReportesController');
    Route::post('/reportes/imprimir','ReportesController@imprimir');

	/***************************************************************************
	*******************************Datos de la empresa *************************
	****************************************************************************/

	Route::resource('/empresa','EmpresaController');




});
