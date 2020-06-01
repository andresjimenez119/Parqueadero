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



Route::get('ticket/{placa}/{id}/{valor}','TicketController@generarTicket')->name('ticket');

Route::resource('ticket','TicketController');
Route::resource('ingresoV','Ingreso_vehiculoController');
Route::resource('vehiculo', 'VehiculoController');
Route::resource('empleado', 'EmpleadoController');
Route::resource('tarifa', 'TarifaController');
Route::resource('tipovehiculo', 'TipoVehiculoController');


Route::get('chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



/*
Route::get('/', function () {
    $tarifa = App\Tarifa::all();
    return $tarifa;

    return $tarifa->tipo_vehiculo->nombre;

    $tipo_vehiculo = App\tipo_vehiculo::findOrfall(1);
    retunr $tipo_vehiculo->tarifa;

    $tarifa = App\Tarifa::all();
    return view('welcome')->with('tarifa',$tarifa);
});
*/