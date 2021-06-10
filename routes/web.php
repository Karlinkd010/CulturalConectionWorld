<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\producController;
use App\Http\Controllers\controlerproducto;
use App\Models\modelo_pro;

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
    $produ=modelo_pro::all();  
    return view('welcome',compact('produ'));
    //<a href="{{route('carritoo', $pro->intid_productos)}}" class="btn btn-success  btn-block" role="button" aria-passed="true">Adquirir</a>
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/venta', [App\Http\Controllers\HomeController::class, 'ventaa'])->name('venta');
Route::get('/venta', [App\Http\Controllers\HomeController::class, 'ventaa'])->name('ventanann');
Route::get('/carrito/{id}','App\Http\Controllers\carritoControler@detallepro')->name('carritoo');
Route::post('/pedidoventa','App\Http\Controllers\carritoControler@pedido')->name('venta');
Route::resource('productoo',producController::class);

//Route::get('carritoprodu/{id}',[App\Http\Controllers\carritoControler::class, 'detallepro'])->name('carrito');

Route::get('/compra', [App\Http\Controllers\HomeController::class, 'compra'])->name('compra');
Route::get('/producto', [App\Http\Controllers\HomeController::class, 'producto'])->name('producto');
Route::post('/agregapro', [App\Http\Controllers\productoContoller::class, 'agrega'])->name('Agrega');



Route::get('/mision', [App\Http\Controllers\HomeController::class, 'contacto'])->name('contacto');

