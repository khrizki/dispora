<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kerjasama extends Model
{
    protected $table = 'kerjasamas';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'slug',
        'nama_mitra',
        'jenis_kerjasama',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    // ✅ Gunakan slug sebagai route key
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // ✅ Auto-generate ID (UUID) dan slug saat creating
    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }

            if (empty($model->slug)) {
                $model->slug = Str::slug($model->nama_mitra . '-' . Str::random(5));
            }
        });
    }
}
