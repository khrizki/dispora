<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JenisKerjaSama extends Model
{
    use HasFactory;

    protected $table = 'jenis_kerjasamas';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_jenis',
        'deskripsi',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = $model->id ?? Str::uuid();
        });
    }

    public function kerjasamas()
    {
        return $this->hasMany(Kerjasama::class, 'jenis_kerjasama_id');
    }
}
