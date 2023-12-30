<?php

namespace App\Models;

use App\Traits\CreatePageFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, CreatePageFile;

    protected $fillable = [
        'title',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public $translatable = ['title'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('pages');
    }

    // Attributes
    public function getVueFileAttribute()
    {
        return Str::studly($this->title);
    }

    public function getVueFilePathAttribute()
    {
        return resource_path("js/Pages/$this->vue_file/index.vue");
    }

    // Scopes
    public function scopeActive($query, $active = true)
    {
        return $query->where('is_active', $active);
    }

    // Relationships
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
