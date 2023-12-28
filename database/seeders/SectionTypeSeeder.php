<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Hero', 'Carousel', 'Contact'];

        foreach ($types as $type) {
            $section = Str::of($type)->singular()->prepend('S')->studly();
            \App\Models\SectionType::create([
                'name'           => $type,
                'component'      => $section,
                'component_path' => "Shared/Sections/$section.vue",
                'slug'           => Str::slug($type),
                'is_active'      => true
            ]);
        }
    }
}
