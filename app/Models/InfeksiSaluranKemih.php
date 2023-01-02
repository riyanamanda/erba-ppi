<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class InfeksiSaluranKemih extends Model
{
    use HasFactory;

    protected $table = 'infeksi_saluran_kemih';

    protected $fillable = [
        'jenis_pemasangan',
        'pemeriksaan',
        'tanggal_pemeriksaan',
        'keterangan',
        'tanggal_pasang',
        'pemasangan_dc_sesuai_indikasi',
        'pemasangan_menggunakan_alat_steril',
        'melakukan_hand_hyglene',
        'segera_dilepas_jika_tidak_indikasi',
        'fiksasi_kateter_dengan_plester',
        'pengisian_balon_sesuai_indikasi',
        'adp_tepat',
        'urine_bag_menggantung',
    ];

    public function surveilans(): MorphOne
    {
        return $this->morphOne(Surveilans::class, 'surveilansable');
    }
}
