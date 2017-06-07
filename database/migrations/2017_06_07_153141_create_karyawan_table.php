<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_unit_kerja')->unsigned();
            $table->integer('id_peran')->unsigned();
            $table->string('nik');
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('jenis_kelamin', [0, 1, 2, 9]);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->rememberToken();

            $table->foreign('id_unit_kerja')->references('id')->on('unit_kerja')->onDelete('cascade');
            $table->foreign('id_peran')->references('id')->on('peran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
