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
        Schema::create('tarif_pembayaran_bulanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id');
            $table->foreignId('siswa_id');
            $table->string('nama_pembayaran');
            $table->string('tahun_ajaran');
            $table->enum('tipe', ['Bulanan','Bebas']);
            $table->string('tagihan');
            $table->string('juli');
            $table->string('agustus');
            $table->string('september');
            $table->string('oktober');
            $table->string('november');
            $table->string('desember');
            $table->string('january');
            $table->string('february');
            $table->string('maret');
            $table->string('april');
            $table->string('mei');
            $table->string('juni');
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
        Schema::dropIfExists('tarif_pembayaran_bulanan');
    }
};
