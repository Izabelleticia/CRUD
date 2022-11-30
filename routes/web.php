<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IzabelleticiaController;

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
    return view('izabelleticia');
});


Route::resource('izabelleticia', IzabelleticiaController::class);
Route::get('/izabelleticia', Izabelleticia::class. '@index');
Route::post('/izabelleticia', Izabelleticia::class. '@store');
Route::put('/izabelleticia/{id}', Izabelleticia::class.'@update');
Route::delete('/izabelleticia/{id}', Izabelleticia::class.'@destroy');