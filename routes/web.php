<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorarioController;

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
Route::get('/ayudantes/gestor-ayudantes', [HorarioController::class, 'gestorAyudantes'])->name('ayudantes.gestor_ayudantes');
Route::get('/ayudantes/nuevo-ayudante', [HorarioController::class, 'gestorAyudantes'])->name('ayudantes.nuevo_ayudante');
Route::post('/ayudantes/guardar-ayudante', [HorarioController::class, 'guardarAyudante'])->name('ayudantes.guardar_ayudante');
Route::get('/ayudantes/nuevo-ayudante', [HorarioController::class, 'nuevoAyudante'])->name('ayudantes.nuevo_ayudante');
Route::post('/ayudantes/{nombre}/cambiar-estado/{estado}', [HorarioController::class, 'cambiarEstado'])->name('ayudantes.cambiarEstado');






