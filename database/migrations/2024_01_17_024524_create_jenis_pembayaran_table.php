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
        Schema::create('jenis_pembayaran', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('pos_id');
            $table->string('pos');
            $table->string('nama_pembayaran');
            $table->string('tipe');
            $table->string('tahun_ajaran');
            // $table->foreignId('tahun_ajaran_id');
            $table->string('tarif_pembayaran');
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
        Schema::dropIfExists('jenis_pembayaran');
    }
};
