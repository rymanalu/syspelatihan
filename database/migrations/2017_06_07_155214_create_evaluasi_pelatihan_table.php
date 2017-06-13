<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluasiPelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelatihan')->unsigned()->nullable();
            $table->string('judul');
            $table->boolean('default');

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
        Schema::dropIfExists('evaluasi_pelatihan');
    }
}
