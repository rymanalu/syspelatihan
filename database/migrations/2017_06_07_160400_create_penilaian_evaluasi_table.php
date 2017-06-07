<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianEvaluasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_evaluasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_evaluasi_pelatihan')->unsigned();
            $table->integer('id_karyawan')->unsigned();
            $table->tinyInteger('nilai');

            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('id_evaluasi_pelatihan')->references('id')->on('evaluasi_pelatihan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_evaluasi');
    }
}
