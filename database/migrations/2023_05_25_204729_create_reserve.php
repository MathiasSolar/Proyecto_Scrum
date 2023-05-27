<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateReserveTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER actualizar_cupos_disponibles 
            AFTER INSERT ON reservas
            BEGIN
                UPDATE horarios
                SET cupos_disponibles = cupos_disponibles - 1
                WHERE id = NEW.horarios_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS actualizar_cupos_disponibles');
    }
}
