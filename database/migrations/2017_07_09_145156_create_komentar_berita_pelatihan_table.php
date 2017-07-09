<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarBeritaPelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_berita_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_karyawan')->unsigned();
            $table->integer('id_berita_pelatihan')->unsigned();
            $table->text('komentar');

            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('id_berita_pelatihan')->references('id')->on('berita_pelatihan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_berita_pelatihan');
    }
}
