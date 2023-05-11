<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->unsignedBigInteger('id_reserva');
            $table->unsignedBigInteger('rut_alumno');
            $table->time('hora_reservada');
            $table->timestamps();

            $table->foreign('id_reserva')->references('id')->on('reservas');
            $table->foreign('rut_alumno')->references('rut')->on('alumnos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}