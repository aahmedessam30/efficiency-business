<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

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

    public $translatable = ['title', 'body', 'style', 'script'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('pages');
    }

    public function getHeaderAttribute()
    {
        return $this->getFirstMediaUrl('pages');
    }

    public function scopeActive($query, $active = true)
    {
        return $query->where('is_active', $active);
    }

    public function scopeHeaderActive($query, $active = true)
    {
        return $query->where('is_header_active', $active);
    }
}
