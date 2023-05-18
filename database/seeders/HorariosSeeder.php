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
        DB::table('horarios')->insert([
            'hora_inicio' => '10 AM',
            'hora_termino' => '11 AM',
            'cupos' => 30,
        ]);

        DB::table('horarios')->insert([
            'hora_inicio' => '11 AM',
            'hora_termino' => '12 AM',
            'cupos' => 30,
        ]);

        DB::table('horarios')->insert([
            'hora_inicio' => '12 AM',
            'hora_termino' => '13 AM',
            'cupos' => 30,
        ]);
    }



}
