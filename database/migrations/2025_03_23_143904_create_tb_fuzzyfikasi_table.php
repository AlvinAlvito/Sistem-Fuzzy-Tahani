<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tb_fuzzyfikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('tb_siswa')->onDelete('cascade');

            // Akademik
            $table->float('akademik_rendah')->default(0);
            $table->float('akademik_sedang')->default(0);
            $table->float('akademik_tinggi')->default(0);

            // Minat
            $table->float('minat_kurang')->default(0);
            $table->float('minat_cukup')->default(0);
            $table->float('minat_tinggi')->default(0);

            // Bakat
            $table->float('bakat_kurang')->default(0);
            $table->float('bakat_sedang')->default(0);
            $table->float('bakat_baik')->default(0);

            // Gaya Belajar
            $table->float('gaya_kurang_baik')->default(0);
            $table->float('gaya_baik')->default(0);
            $table->float('gaya_sangat_baik')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_fuzzyfikasi');
    }
};

