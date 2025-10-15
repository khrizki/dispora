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
        'data' => 'array', 
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeOfType($query, $type)
    {
        return $query->where('content_type', $type);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function isTextType()
    {
        return in_array($this->content_type, ['text', 'faq']);
    }

    public function isGalleryType()
    {
        return $this->content_type === 'gallery';
    }

    public function isDownloadType()
    {
        return $this->content_type === 'download';
    }

    public function getGalleryItemsAttribute()
    {
        if ($this->isGalleryType() && is_array($this->data)) {
            return $this->data;
        }
        return [];
    }


    public function getDownloadFilesAttribute()
    {
        if ($this->isDownloadType() && is_array($this->data)) {
            return $this->data;
        }
        return [];
    }
}