<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsuContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key',
        'section_title',
        'content_type',
        'content',
        'data',
        'order',
        'is_active',
        'is_published'
    ];

    protected $casts = [
        'data' => 'array',
        'is_active' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function scopeProgram($query)
    {
        return $query->where('content_type', 'program');
    }

    public function scopeReport($query)
    {
        return $query->where('content_type', 'report');
    }

    public function scopeStatistic($query)
    {
        return $query->where('content_type', 'statistic');
    }

    public function scopeGallery($query)
    {
        return $query->where('content_type', 'gallery');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getData($key, $default = null)
    {
        return data_get($this->data, $key, $default);
    }

    public function setData($key, $value)
    {
        $data = $this->data ?? [];
        data_set($data, $key, $value);
        $this->data = $data;
        return $this;
    }

    public function getFormattedBudgetAttribute()
    {
        $budget = $this->getData('budget');
        return $budget ? 'Rp ' . number_format($budget, 0, ',', '.') : '-';
    }

    public function getProgressAttribute()
    {
        return $this->getData('progress', 0);
    }

    public function getStatusAttribute()
    {
        return $this->getData('status', 'planning');
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'planning' => 'Perencanaan',
            'ongoing' => 'Dalam Pengerjaan',
            'final_stage' => 'Tahap Akhir',
            'completed' => 'Selesai',
            'suspended' => 'Ditunda'
        ];
        return $labels[$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute()
    {
        $colors = [
            'planning' => 'secondary',
            'ongoing' => 'primary',
            'final_stage' => 'info',
            'completed' => 'success',
            'suspended' => 'warning'
        ];
        return $colors[$this->status] ?? 'secondary';
    }

    public function scopeOrdered($query)
{
    return $query->orderBy('order', 'asc');
}

}
