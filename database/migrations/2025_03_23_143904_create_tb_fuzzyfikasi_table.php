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
            $table->enum('akademik', ['Rendah', 'Sedang', 'Tinggi']);
            $table->enum('minat', ['Kurang', 'Cukup', 'Tinggi']);
            $table->enum('bakat', ['Kurang', 'Sedang', 'Baik']);
            $table->enum('gaya_belajar', ['Kurang baik', 'Baik', 'Sangat baik']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_fuzzyfikasi');
    }
};
