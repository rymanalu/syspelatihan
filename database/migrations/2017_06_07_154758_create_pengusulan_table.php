<?php

use App\Pengusulan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengusulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengusulan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_karyawan')->unsigned();
            $table->text('keterangan_pelatihan')->nullable();
            $table->text('target_hasil_pelatihan')->nullable();
            $table->text('catatan')->nullable();
            $table->tinyInteger('status')->default(Pengusulan::BARU);
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_approve_1')->nullable();
            $table->date('tanggal_approve_2')->nullable();

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
        Schema::dropIfExists('pengusulan');
    }
}
