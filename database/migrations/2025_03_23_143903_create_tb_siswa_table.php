<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('akademik')->checkBetween(0, 100);
            $table->integer('minat')->checkBetween(0, 100);
            $table->integer('bakat')->checkBetween(0, 100);
            $table->integer('gaya_belajar')->checkBetween(0, 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_siswa');
    }
};
