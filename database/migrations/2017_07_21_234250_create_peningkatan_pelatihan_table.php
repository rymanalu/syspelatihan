<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeningkatanPelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peningkatan_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelatihan')->unsigned();
            $table->integer('id_karyawan')->unsigned();
            $table->integer('pre_test')->unsigned();
            $table->integer('post_test')->unsigned();
            $table->integer('peningkatan');

            $table->foreign('id_pelatihan')->references('id')->on('pelatihan')->onDelete('cascade');
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peningkatan_pelatihan');
    }
}
