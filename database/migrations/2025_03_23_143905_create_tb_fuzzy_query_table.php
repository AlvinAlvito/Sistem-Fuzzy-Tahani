<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('tb_fuzzy_query', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('tb_siswa')->onDelete('cascade');
            $table->float('ipa');
            $table->float('ips');
            $table->float('agama');
            $table->string('rekomendasi', 10);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tb_fuzzy_query');
    }
};
