<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritaPelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_provider')->unsigned();
            $table->integer('id_kategori_pelatihan')->unsigned();
            $table->string('nama');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->decimal('biaya_per_orang', 19, 4);
            $table->string('brosur')->nullable();
            $table->text('catatan')->nullable();

            $table->foreign('id_provider')->references('id')->on('provider')->onDelete('cascade');
            $table->foreign('id_kategori_pelatihan')->references('id')->on('kategori_pelatihan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_pelatihan');
    }
}
