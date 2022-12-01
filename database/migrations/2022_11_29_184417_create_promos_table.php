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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('judul_promo');
            $table->string('nama_barang');
            $table->string('slug')->unique();
            $table->string('harga');
            $table->string('deskripsi_barang');
            $table->string('gambar_barang');
            $table->string('gambar_detail_barang');
            $table->double('diskon');
            $table->foreignId('kategori_id');
            $table->string('keterangan');
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
        Schema::dropIfExists('promos');
    }
};
