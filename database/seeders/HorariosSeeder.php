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
        //DB::table('horarios')->insert([
        //    'fecha' => '22/04/2023',
        //    'hora_inicio' => '10 AM',
        //    'hora_termino' => '11 AM',
        //    'cupos_disponibles' => 30,
        //]);
//
        //DB::table('horarios')->insert([
        //    'fecha' => '22/04/2023',
        //    'hora_inicio' => '11 AM',
        //    'hora_termino' => '12 AM',
        //    'cupos_disponibles' => 30,
        //]);
//
        //DB::table('horarios')->insert([
        //    'fecha' => '22/04/2023',
        //    'hora_inicio' => '12 AM',
        //    'hora_termino' => '13 AM',
        //    'cupos_disponibles' => 30,
        //]);

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

        DB::table('ayudantes')->insert([
            'rut'=>"19128143-1",
            'nombre'=>'Mathias',
            'apellido'=>"Solar",
            'constraseña'=>"123",
            'correo_electronico'=>"mathiassolar@gmail.com",
            'codigo_carrera'=>15462,
        ]);
    }



}
