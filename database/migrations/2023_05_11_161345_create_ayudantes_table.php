<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyudantesTable extends Migration
{
    public function up()
    {
        Schema::create('ayudantes', function (Blueprint $table) {
            $table->string('rut')->primary();
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('constraseña');
            $table->string('correo_electronico')->unique();
            $table->unsignedBigInteger('codigo_carrera');
            $table->timestamps();

            $table->foreign('codigo_carrera')->references('codigo_carrera')->on('carreras')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ayudantes');
    }
}