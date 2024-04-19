<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan_bebas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pembayaran_id');
            $table->foreignId('siswa_id');
            $table->foreignId('kelas_id');
            $table->integer('total_tagihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihan_bebas');
    }
};
