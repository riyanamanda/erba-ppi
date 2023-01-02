<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Phlebitis extends Model
{
    use HasFactory;

    protected $table = 'phlebitis';

    protected $fillable = [
        'jenis_pemasangan',
        'tujuan_pemasangan',
        'tanggal_pasang',
        'tanggal_lepas',
        'keterangan',
        'lokasi',
        'lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan',
        'melepas_pemasangan_apabila_ada_keluhan_atau_peradangan',
        'drayssing',
        'melepas_pemasangan_apabila_lebih_dari_72_jam',
        'lakukan_pengecekan_tempat_pemasangan',
    ];

    public function surveilans(): MorphOne
    {
        return $this->morphOne(Surveilans::class, 'surveilansable');
    }
}
