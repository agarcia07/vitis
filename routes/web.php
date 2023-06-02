<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\WebvitisController;


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

// Esta ruta lleva a la pagina de inicio que es welcome, se va a sustituir por el inicio de sesion
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

//middleware('auth') -> requiere estar autenticado para ir directamente a la ruta

Route::get('/parcelas', [ParcelaController::class, 'index'])->middleware('auth')->name('parcelas');

Route::get('/parcelas/crear', [ParcelaController::class, 'create'])->middleware('auth');

Route::get('/parcelas/editar/{id}', [ParcelaController::class, 'edit'])->middleware('auth');

Route::post('/parcelas', [ParcelaController::class, 'store'])->middleware('auth');

Route::delete('/parcelas/{id}', [ParcelaController::class, 'destroy'])->middleware('auth');

Route::patch('parcelas/{id}', [ParcelaController::class, 'update'])->middleware('auth');

// Route que incluye todo el listado para el controlador ParcelaCOntroller
// Route::resource('parcelas', ParcelaController::class);

//Apartado Web
Route::get('/web', [WebvitisController::class, 'index']);

//Eliminamos el enlace de registro y de olvido la contraseña
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [ParcelaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ParcelaController::class, 'index'])->name('home');
});


