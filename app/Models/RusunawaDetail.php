<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RusunawaDetail extends Model
{
    protected $fillable = [
        'rusunawa_id', 'kode', 'uprs', 'kepala_uprs', 'luas_area_m2',
        'nomor_imb', 'nomor_slf', 'dana_pembangunan', 'status_serah_terima',
        'tahun_pembuatan', 'tarif_unit_terprogram', 'tarif_unit_umum',
        'batas_maksimum_gaji', 'alamat', 'kelurahan', 'kecamatan',
        'kota_kabupaten', 'embed_gmaps_url', 'fasilitas', 'galeri_foto', 'deskripsi'
    ];
    
    protected $casts = [
        'fasilitas' => 'array',
        'galeri_foto' => 'array',
    ];
    
    public function rusunawa()
    {
        return $this->belongsTo(Rusunawa::class);
    }
}