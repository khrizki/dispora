<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rusunawa extends Model
{
    protected $fillable = [
        'nama',
        'area_id',
        'jumlah_tower',
        'jumlah_blok',
        'total_unit',
        'tipe_unit',
        'jumlah_unit_kosong',
        'pengelola',
        'nomor_hotline',
        'gambar',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
