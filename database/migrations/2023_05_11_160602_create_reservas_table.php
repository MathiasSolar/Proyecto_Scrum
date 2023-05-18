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
            $table->unsignedBigInteger('alumnos_rut');
            $table->date('fecha_reserva');
            $table->boolean('asistencia')->nullable();
            $table->unsignedBigInteger('horarios_id');
            $table->unsignedBigInteger('ayudantes_rut');
            $table->timestamps();

            $table->foreign('alumnos_rut')->references('rut')->on('alumnos')->onDelete('cascade');
            $table->foreign('ayudantes_rut')->references('rut')->on('ayudantes')->onDelete('cascade');
            $table->foreign('horarios_id')->references('id')->on('horarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}