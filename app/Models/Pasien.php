<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'no_rekam_medis',
        'nik',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'jenis_asuransi',
        'dokter_penanggung_jawab_layanan',
        'ruang_rawat_inap',
    ];

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'dokter_penanggung_jawab_layanan', 'id');
    }

    public function ruang()
    {
        return $this->belongsTo(RuangRawatInap::class, 'ruang_rawat_inap', 'id');
    }
}
