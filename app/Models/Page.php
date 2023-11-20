<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'style',
        'script',
        'is_active',
        'is_header_active'
    ];

    protected $casts = [
        'is_active'        => 'boolean',
        'is_header_active' => 'boolean'
    ];

    public function scopeActive($query, $active = true)
    {
        return $query->where('is_active', $active);
    }

    public function scopeHeaderActive($query, $active = true)
    {
        return $query->where('is_header_active', $active);
    }
}
