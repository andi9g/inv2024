<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Inventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('iditem');
            $table->string("kdbarang")->unique();
            $table->integer("idsatuan");
            $table->integer("idketerangan");
            $table->String("namaitem")->unique();
            $table->integer("stok");
            $table->double("hargaitem");
            $table->timestamps();
        });
       
        Schema::create('itemhabis', function (Blueprint $table) {
            $table->bigIncrements('iditemhabis');
            $table->integer("iditem");
            $table->integer("stok");
            $table->double("hargaitem");
            $table->date("tanggal");
            $table->timestamps();
        });

        Schema::create('itemexpired', function (Blueprint $table) {
            $table->bigIncrements('iditemhabis');
            $table->integer("iditem");
            $table->integer("stok");
            $table->double("hargaitem");
            $table->date("tanggal");
            $table->timestamps();
        });

        Schema::create('satuan', function (Blueprint $table) {
            $table->bigIncrements('idsatuan');
            $table->String("satuan");
            $table->timestamps();
        });

        
        Schema::create('keterangan', function (Blueprint $table) {
            $table->bigIncrements('idketerangan');
            $table->string("keterangan")->unique();
            $table->timestamps();
        });


        $satuan = [
            "kg",
            "ons",
            "liter",
            "item",
            "buah",
            "unit",
        ];

        foreach ($satuan as $item) {
            DB::table("satuan")->insert([
                "satuan" => $item,
            ]);
        }

        $keterangan = [
            "masuk",
            "keluar",
            "expired",
        ];

        foreach ($keterangan as $item) {
            DB::table("keterangan")->insert([
                "keterangan" => $item,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
