<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliotecaController;

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
// oculta la pantalla de laravel y redirecciona al login
Route::get('/', function () {
    return view('auth.login');
});


// ruta directa para mostrar pantalla
Route::resource('bibliotecas',BibliotecaController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [BibliotecaController::class, 'index'])->name('home');
//Nueva direccion para inicio
Route::group(['middleware'=>'auth'],function () {
    Route::get('/', [BibliotecaController::class, 'index'])->name('home');
    
});


Route::get('/imagen/{imagen}', [BibliotecaController::class, 'mostrarImagen'])->name('show.image');

Route::get('/libro/detalles/{id?}', [BibliotecaController::class, 'libroShow'])->name('show.libro');
//Ruta para buscador en tiempo real