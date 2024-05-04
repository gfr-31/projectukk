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
        Schema::create('transaksi_bulanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->string('tahun_ajaran');
            $table->foreignId('kelas_id');
            $table->foreignId('siswa_id');
            $table->string('nama_pembayaran');
            $table->enum('tipe', ['Bulanan','Bebas']);
            $table->integer('tagihan');
            $table->integer('sisa_tagihan');
            $table->integer('jumlah_bayar');
            $table->string('bulan');
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
        Schema::dropIfExists('transaksi_bulanan');
    }
};
