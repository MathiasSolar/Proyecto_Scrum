<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyudantesTable extends Migration
{
    public function up()
    {
        Schema::create('ayudantes', function (Blueprint $table) {
            $table->string('rut')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('correo_electronico')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ayudantes');
    }
}