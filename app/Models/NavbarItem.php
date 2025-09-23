<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavbarItem extends Model
{
    protected $table = 'navbar_items'; // pakai nama tabel sesuai DB
    protected $fillable = [
        'title',
        'link',
        'parent_id',
        'order',
        'is_active',
    ];
}
