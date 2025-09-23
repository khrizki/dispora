<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterItem extends Model
{
    protected $table = 'footeritem';
    protected $fillable = [
        'title',
        'content',
        'link',
        'order',
        'is_active',
    ];
}
