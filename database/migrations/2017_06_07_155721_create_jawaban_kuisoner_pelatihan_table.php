<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanKuisonerPelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_kuisoner_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kuisoner_pelatihan')->unsigned();
            $table->integer('id_karyawan')->unsigned();
            $table->integer('id_pelatihan')->unsigned();
            $table->tinyInteger('jawaban');

            $table->foreign('id_kuisoner_pelatihan')->references('id')->on('kuisoner_pelatihan')->onDelete('cascade');
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('id_pelatihan')->references('id')->on('pelatihan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_kuisoner_pelatihan');
    }
}
