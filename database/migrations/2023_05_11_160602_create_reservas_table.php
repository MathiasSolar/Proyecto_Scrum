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
            $table->string('asistencia')->nullable();
            $table->unsignedBigInteger('horario_id');
            $table->unsignedBigInteger('rut_ayudante');
            $table->timestamps();

            $table->foreign('rut_alumno')->references('rut')->on('alumnos');
            $table->foreign('rut_ayudante')->references('rut')->on('ayudantes');
            $table->foreign('horario_id')->references('id')->on('horarios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}