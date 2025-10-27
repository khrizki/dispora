<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kerjasama extends Model
{
    protected $table = 'kerjasamas';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'slug',
        'nama_mitra',
        'jenis_kerjasama_id',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = $model->id ?? Str::uuid();
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->nama_mitra . '-' . Str::random(5));
            }
        });
    }

    public function jenis()
    {
        return $this->belongsTo(JenisKerjaSama::class, 'jenis_kerjasama_id');
    }
}
