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

    // Relationships
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function sectionType()
    {
        return $this->belongsTo(SectionType::class);
    }
}
