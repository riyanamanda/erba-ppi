<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Surveilans extends Model
{
    use HasFactory;

    protected $table = 'surveilans';

    protected $fillable = [
        'pasien',
        'surveilansable_id',
        'surveilansable_type',
    ];

    public function datapasien(): HasOne
    {
        return $this->hasOne(Pasien::class, 'id', 'pasien');
    }

    public function surveilansable(): MorphTo
    {
        return $this->morphTo();
    }
}
