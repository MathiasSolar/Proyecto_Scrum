<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rut_alumno');
            $table->date('fecha_reserva');
            $table->time('hora_reserva');
            $table->time('hora_elegida');
            $table->timestamps();

            $table->foreign('rut_alumno')->references('rut')->on('alumnos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}