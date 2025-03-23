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
            $table->integer('akademik');
            $table->integer('minat');
            $table->integer('bakat');
            $table->integer('gaya_belajar');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_siswa');
    }
};
