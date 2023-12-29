<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'component', 'component_path', 'slug', 'is_active'];

    // Scopes...
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeIs($query, $name)
    {
        return $query->where('name', ucfirst($name));
    }
}
