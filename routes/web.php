<?php

use App\Http\Controllers\CultivoController;
use App\Http\Controllers\MunicipioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\TipoTrabajoController;
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


//PARCELAS
//middleware('auth') -> requiere estar autenticado para ir directamente a la ruta

Route::get('/parcelas', [ParcelaController::class, 'index'])->middleware('auth')->name('parcelas');

Route::get('/parcelas/crear', [ParcelaController::class, 'create'])->middleware('auth');

Route::get('/parcelas/editar/{id}', [ParcelaController::class, 'edit'])->middleware('auth')->name('editar');

Route::post('/parcelas', [ParcelaController::class, 'store'])->middleware('auth');

Route::delete('/parcelas/{id}', [ParcelaController::class, 'destroy'])->middleware('auth');

Route::patch('parcelas/{id}', [ParcelaController::class, 'update'])->middleware('auth');

// Route que incluye todo el listado para el controlador ParcelaCOntroller
// Route::resource('parcelas', ParcelaController::class);

//APARTADO WEB
Route::get('/web', [WebvitisController::class, 'index'])->name('web');
Route::post('/web', [WebvitisController::class, 'storeTrabajo']);

//PROVINCIAS
Route::get('/provincias', [ProvinciaController::class, 'index'])->middleware('auth')->name('provincias');
Route::get('/provincias/crear', [ProvinciaController::class, 'create'])->middleware('auth');
Route::post('/provincias', [ProvinciaController::class, 'store'])->middleware('auth');
Route::get('provincias/editar/{id}', [ProvinciaController::class, 'edit'])->middleware('auth');
Route::patch('provincias/{id}', [ProvinciaController::class, 'update'])->middleware('auth');
Route::delete('/provincias/{id}', [ProvinciaController::class, 'destroy'])->middleware('auth');

//MUNICIPIOS
Route::get('/municipios', [MunicipioController::class, 'index'])->middleware('auth')->name('municipios');
Route::get('/municipios/crear', [MunicipioController::class, 'create'])->middleware('auth');
Route::post('/municipios', [MunicipioController::class, 'store'])->middleware('auth');
Route::get('municipios/editar/{id}', [MunicipioController::class, 'edit'])->middleware('auth');
Route::patch('municipios/{id}', [MunicipioController::class, 'update'])->middleware('auth');
Route::delete('/municipios/{id}', [MunicipioController::class, 'destroy'])->middleware('auth');


//CULTIVOS
Route::get('/cultivos', [CultivoController::class, 'index'])->middleware('auth')->name('cultivos');
Route::get('/cultivos/crear', [CultivoController::class, 'create'])->middleware('auth');
Route::post('/cultivos', [CultivoController::class, 'store'])->middleware('auth');
Route::get('cultivos/editar/{id}', [CultivoController::class, 'edit'])->middleware('auth');
Route::patch('cultivos/{id}', [CultivoController::class, 'update'])->middleware('auth');
Route::delete('/cultivos/{id}', [CultivoController::class, 'destroy'])->middleware('auth');

//TRABAJOS
Route::get('/trabajos', [TrabajoController::class, 'index'])->middleware('auth')->name('trabajos');
Route::get('/trabajos/crear', [TrabajoController::class, 'create'])->middleware('auth');
Route::post('/trabajos', [TrabajoController::class, 'store'])->middleware('auth');
Route::get('trabajos/editar/{id}', [TrabajoController::class, 'edit'])->middleware('auth');
Route::patch('trabajos/{id}', [TrabajoController::class, 'update'])->middleware('auth');
Route::delete('/trabajos/{id}', [TrabajoController::class, 'destroy'])->middleware('auth');

//TRABAJOS
Route::get('/tipo-trabajos', [TipoTrabajoController::class, 'index'])->middleware('auth')->name('tipo-trabajos');
Route::get('/tipo-trabajos/crear', [TipoTrabajoController::class, 'create'])->middleware('auth');
Route::post('/tipo-trabajos', [TipoTrabajoController::class, 'store'])->middleware('auth');
Route::get('tipo-trabajos/editar/{id}', [TipoTrabajoController::class, 'edit'])->middleware('auth');
Route::patch('tipo-trabajos/{id}', [TipoTrabajoController::class, 'update'])->middleware('auth');
Route::delete('/tipo-trabajos/{id}', [TipoTrabajoController::class, 'destroy'])->middleware('auth');


//AUTENTICACION
//Eliminamos el enlace de registro y de olvido la contraseña
Auth::routes(['register'=>false,'reset'=>false]);
// Auth::routes(['reset'=>false]);

Route::get('/home', [ParcelaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ParcelaController::class, 'index'])->name('home');
});


