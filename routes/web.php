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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('clasificacion/categoria', 'CategoriaController');
Route::resource('cotizaciones/cliente', 'ClienteController')->middleware('auth');
Route::post('cotizaciones/cliente', 'ClienteController@getClient')->name('getClient');
Route::post('cotizaciones/cliente', 'ClienteController@getClientId')->name('getClientId');
Route::resource('almacen/categoria_producto', 'Categoria_productoController');
Route::resource('almacen/producto', 'ProductoController')->middleware('auth');;
Route::get('almacen/producto_json', 'ProductoController@getProduct')->name('getProduct');
Route::resource('cotizaciones/cotizacion', 'Cotizacion_prodController');
Route::resource('almacen/proveedor', 'ProveedorController');
Route::resource('ingresos/compra', 'Comp_provController');
Route::get('cotizaciones/cotizacion/show/{id}','Cotizacion_prodController@show');
Route::get('/dynamic_pdf/pdf','DynamicPdfController@pdf');

/*Route::get('/pdfprube', function (){
    //return view('pdfprube');

    $pdf=PDF::loadview ('pdfprube');
    return $pdf->stream('pdfprube.pdf');
});*/

//Route::get('cotizaciones/cotizacion', 'Cotizacion_prodController@crearPdf');
Auth::routes();
//Route::auth();

Route::get('/home', 'HomeController@index')->name('home');
