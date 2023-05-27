<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorasController;
use App\Http\Controllers\HorarioController;

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
    return view('welcome');
});

Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
Route::get('/horarios/{horario}/reservar', [HorarioController::class, 'reservar'])->name('horarios.reservar');
Route::post('/horarios/{horario}/guardar-reserva', [HorarioController::class, 'guardarReserva'])->name('horarios.guardarReserva');
Route::get('/horarios/{horario}/alumnos-reservados', [HorarioController::class, 'alumnosReservados'])->name('horarios.alumnosReservados');
Route::get('/horarios/generar', [HorarioController::class,'generarHorarios'])->name('horarios.generar');
Route::post('/buscar-alumno', [HorarioController::class, 'buscarAlumno'])->name('buscarAlumno');




