<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RtlhContent extends Model
{
    use HasFactory;

    protected $table = 'rtlh_contents';

    protected $fillable = [
        'section_key',
        'section_title',
        'content_type',
        'content',
        'data',
        'order',
        'is_active',
    ];

    protected $casts = [
        'data' => 'array', // Otomatis convert JSON ke array
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Scope untuk filter berdasarkan type
    public function scopeOfType($query, $type)
    {
        return $query->where('content_type', $type);
    }

    // Scope untuk yang aktif saja
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Helper method untuk cek apakah type text
    public function isTextType()
    {
        return in_array($this->content_type, ['text', 'faq']);
    }

    // Helper method untuk cek apakah type gallery
    public function isGalleryType()
    {
        return $this->content_type === 'gallery';
    }

    // Helper method untuk cek apakah type download
    public function isDownloadType()
    {
        return $this->content_type === 'download';
    }

    // Accessor untuk mendapatkan gallery items
    public function getGalleryItemsAttribute()
    {
        if ($this->isGalleryType() && is_array($this->data)) {
            return $this->data;
        }
        return [];
    }

    // Accessor untuk mendapatkan download files
    public function getDownloadFilesAttribute()
    {
        if ($this->isDownloadType() && is_array($this->data)) {
            return $this->data;
        }
        return [];
    }
}