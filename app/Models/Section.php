<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'section_type_id',
        'title',
        'subtitle',
        'slug',
        'image',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::addGlobalScope('order', function ($builder) {
            $builder->orderBy('order', 'asc');
        });
    }

    // Relationships
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function sectionType()
    {
        return $this->belongsTo(SectionType::class);
    }

    public function image()
    {
        return $this->belongsTo(ImageContent::class);
    }

    public function button()
    {
        return $this->belongsTo(ButtonContent::class);
    }

    public function video()
    {
        return $this->belongsTo(VideoContent::class);
    }

    public function audio()
    {
        return $this->belongsTo(AudioContent::class);
    }

    public function iframe()
    {
        return $this->belongsTo(IframeContent::class);
    }
}
