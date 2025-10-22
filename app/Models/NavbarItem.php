<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavbarItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'order',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(NavbarItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NavbarItem::class, 'parent_id')->orderBy('order');
    }
}
