<?php

use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PeriodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


//perfil
Route::get('perfil', [PacienteController::class, 'perfil'])->name('perfil');
Route::post('user-perfil', [PacienteController::class, 'actualizarPerfil'])->name('user-perfil');

//Consulta
Route::get('Consulta', [ConsultaController::class, 'index'])->name('consulta');
Route::get('Registro', [ConsultaController::class, 'registro'])->name('registro');
Route::get('Consultas', [ConsultaController::class, 'mostrarConsultas'])->name('mostrar_consulta');
Route::post('Registrar/Consulta', [ConsultaController::class, 'storeConsulta'])->name('registrar_consulta');
Route::post('Registrar/Adicional', [ConsultaController::class, 'store'])->name('registrar_adicional');

//diagnostico
Route::post('/generar-diagnostico', [DiagnosticoController::class, 'store']);

//periodo
Route::get('/Periodo',[PeriodoController::class,'index'])->name('periodo');
Route::post('/registrar/periodo',[PeriodoController::class,'store'])->name('registrar_periodo');

//Alimento
Route::get('/Alimento',[AlimentoController::class,'index'])->name('alimento');
Route::post('registrar-alimento',[AlimentoController::class,'store']);

//Dieta
Route::get('/Dieta',[DietaController::class,'index'])->name('dieta');

Route::get('/periodos', [PeriodoController::class, 'obtenerPeriodos']);
Route::get('/dias/{idPeriodo}', [PeriodoController::class, 'obtenerDias']);
Route::get('/horas/{idDia}', [PeriodoController::class, 'obtenerHoras']);

