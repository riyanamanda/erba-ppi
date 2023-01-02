<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phlebitis', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pemasangan');
            $table->string('tujuan_pemasangan');
            $table->date('tanggal_pasang');
            $table->date('tanggal_lepas');
            $table->text('keterangan');
            $table->string('lokasi');
            $table->boolean('lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan');
            $table->boolean('melepas_pemasangan_apabila_ada_keluhan_atau_peradangan');
            $table->boolean('drayssing');
            $table->boolean('melepas_pemasangan_apabila_lebih_dari_72_jam');
            $table->boolean('lakukan_pengecekan_tempat_pemasangan');
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
        Schema::dropIfExists('phlebitis');
    }
};
