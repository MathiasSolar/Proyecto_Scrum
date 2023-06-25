<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('carreras')->insert([
            'codigo_carrera'=>15180,
            'nombre_carrera'=>'Arquitectura',
        ]);

        DB::table('carreras')->insert([
            'codigo_carrera'=>15110,
            'nombre_carrera'=>'Construcción Civil',
        ]);

        DB::table('carreras')->insert([
            'codigo_carrera'=>15111,
            'nombre_carrera'=>'Ingeniería Civil',
        ]);

        DB::table('carreras')->insert([
            'codigo_carrera'=>15151,
            'nombre_carrera'=>'Ingeniería Civil Ambiental',
        ]);

        DB::table('carreras')->insert([
            'codigo_carrera'=>15462,
            'nombre_carrera'=>'Ingeniería en Informática',
        ]);

        DB::table('alumnos')->insert([
            'rut'=>'19.128.143-1',
            'nombre'=>'Mathias',
            'apellido'=>'Solar',
            'correo_electronico'=>'mathiassolar@gmail.com',
            'carreras_codigo_carrera'=>15462,
        ]);

        DB::table('alumnos')->insert([
            'rut'=>'21.289.171-1',
            'nombre'=>'Carlos',
            'apellido'=>'Donoso',
            'correo_electronico'=>'carlos.donosogo@usm.cl',
            'carreras_codigo_carrera'=>15462,
        ]);

        DB::table('ayudantes')->insert([
            'rut'=>'11.111.111-1',
            'nombre'=>'prueba',
            'apellido'=>'prueba2',
            'correo_electronico'=>'prueba@usm.cl',
            'estado'=>'activo',
            'carreras_codigo_carrera'=>15110,
        ]);

    }



}
