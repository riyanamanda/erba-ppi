<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RuangRawatInap extends Model
{
    use HasFactory;

    protected $table = 'ruang_rawat_inap';

    protected $fillable = [
        'nama',
        'kelas',
    ];

    public function pasien(): HasMany
    {
        return $this->hasMany(Pasien::class, 'ruang_rawat_inap', 'id');
    }
}
