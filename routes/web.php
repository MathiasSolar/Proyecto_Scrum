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
Route::post('/horarios/reservas/{reservaId}/cambiar-asistencia/{estado}', [HorarioController::class, 'cambiarAsistencia'])->name('horarios.cambiarAsistencia');
Route::get('/horarios/reservas/{reservaId}/modificar', [HorarioController::class, 'modificarReserva'])->name('horarios.modificarReserva');
Route::get('/horarios/{reserva}/modificar-reserva', [HorarioController::class, 'modificarReserva'])->name('horarios.modificarReserva');
Route::put('/horarios/{reserva}/actualizar-reserva', [HorarioController::class, 'actualizarReserva'])->name('horarios.actualizarReserva');
Route::delete('/horarios/eliminar-reserva/{reserva}', [HorarioController::class, 'eliminarReserva'])->name('horarios.eliminarReserva');
Route::get('/horarios/buscar', [HorarioController::class, 'buscar'])->name('horarios.buscar');
Route::get('/alumnos/filtrar', [HorarioController::class, 'filtrarAlumnos'])->name('alumnos.filtrar');
Route::get('/ayudantes/gestor-ayudantes',[HorarioController::class, 'gestorAyudantes'])->name('ayudantes.gestor_ayudantes');
Route::post('/ayudantes/agregar', [HorarioController::class, 'agregarAyudante'])->name('ayudantes.agregar');
Route::put('/ayudantes/{ayudante}/cambiar-estado', [HorarioController::class, 'cambiarEstado'])->name('ayudantes.cambiarEstado');


