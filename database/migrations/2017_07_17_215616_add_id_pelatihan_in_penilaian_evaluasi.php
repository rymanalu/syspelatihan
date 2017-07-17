<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdPelatihanInPenilaianEvaluasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_evaluasi', function (Blueprint $table) {
            $table->integer('id_pelatihan')->unsigned();

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
        Schema::table('penilaian_evaluasi', function (Blueprint $table) {
            $table->dropForeign(['id_pelatihan']);

            $table->dropColumn('id_pelatihan');
        });
    }
}
