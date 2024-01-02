<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER habis AFTER INSERT ON itemhabis
            FOR EACH ROW
            BEGIN
                UPDATE item
                SET stok = stok - NEW.stok
                WHERE iditem = NEW.iditem;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER expired AFTER INSERT ON itemexpired
            FOR EACH ROW
            BEGIN
                UPDATE item
                SET stok = stok - NEW.stok
                WHERE iditem = NEW.iditem;
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
        DB::unprepared('DROP TRIGGER IF EXISTS habis;');
        DB::unprepared('DROP TRIGGER IF EXISTS expired;');
    }
}
