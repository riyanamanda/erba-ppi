<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infeksi_saluran_kemih', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pemasangan');
            $table->string('pemeriksaan');
            $table->date('tanggal_pemeriksaan');
            $table->text('keterangan');
            $table->date('tanggal_pasang');
            $table->boolean('pemasangan_dc_sesuai_indikasi');
            $table->boolean('pemasangan_menggunakan_alat_steril');
            $table->boolean('melakukan_hand_hyglene');
            $table->boolean('segera_dilepas_jika_tidak_indikasi');
            $table->boolean('fiksasi_kateter_dengan_plester');
            $table->boolean('pengisian_balon_sesuai_indikasi');
            $table->boolean('adp_tepat');
            $table->boolean('urine_bag_menggantung');
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
        Schema::dropIfExists('infeksi_saluran_kemih');
    }
};
