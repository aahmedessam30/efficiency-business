<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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

    // Methods
    public static function createPageVueFile($page): void
    {
        $pageName       = Str::studly($page->title);
        $pagePath       = resource_path("js/Pages/$pageName/index.vue");
        $sections       = [];
        $components     = [];
        $importSections = [];

        foreach ($page->sections as $index => $section) {
            $sections[] = Str::of($section->sectionType->component)
                ->when($index !== 0, fn ($str) => $str->prepend("\t\t<"), fn ($str) => $str->prepend("<"))
                ->append(' />');

            $components[] = Str::of($section->sectionType->component)
                ->when($index !== 0, fn ($str) => $str->prepend("\t\t\t\t"), fn ($str) => $str->prepend("\t"))
                ->append(',');

            $importSections[] = Str::of($section->sectionType->component_path)
                ->prepend("import {$section->sectionType->component} from '@/")
                ->append("';");
        }

        $file = str_replace('\\', '/', $pagePath);
        $stub = str_replace(
            ['{{ pageName }}', '{{ sections }}', '{{ importSections }}', '{{ components }}'],
            [
                $pageName,
                implode("\n", $sections),
                implode("\n", $importSections),
                implode("\n", $components),
            ],
            file_get_contents(base_path('stubs/vuepage.stub'))
        );

        if (!is_dir(dirname($file)) && !mkdir($concurrentDirectory = dirname($file)) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }

        if (!file_exists($file)) {
            file_put_contents($file, $stub);
        }

        static::appendPageRoute($page, $pageName);
    }

    public static function appendPageRoute($page, $pageName): void
    {
        $routes    = file_get_contents(base_path('routes/web.php'));
        $pageRoute = "\nRoute::get('/$page->slug', fn () => inertia('$pageName/index'))->name('page.$page->slug');";

        if (!Str::contains($routes, $pageRoute)) {
            file_put_contents(base_path('routes/web.php'), $pageRoute, FILE_APPEND);
        }
    }
}
