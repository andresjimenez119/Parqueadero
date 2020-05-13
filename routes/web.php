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


Route::resource('vehiculo', 'VehiculoController');
Route::resource('empleado', 'EmpleadoController');

Route::resource('tarifa', 'TarifaController');

Route::resource('tipovehiculo', 'TipoVehiculoController');

Route::resource('ingresoV','Ingreso_vehiculoController');


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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
 

