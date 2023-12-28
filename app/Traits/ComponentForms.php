<?php

namespace App\Traits;

use App\Models\SectionType;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Illuminate\Support\Str;

trait ComponentForms
{
    public static function getSectionTypeComponentField()
    {
        return [
            static::heroForm(),
            static::carouselForm(),
            static::contactForm(),
        ];
    }

    private static function heroForm(): Component
    {
        return Fieldset::make(__('attributes.hero'))
            ->label(__('attributes.hero'))
            ->visible(fn(Get $get) => $get('section_type_id') == SectionType::where('name', 'Hero')->first()->id)
            ->schema([
                Toggle::make('is_active')
                    ->label(__('attributes.active'))
                    ->default(true),
            ]);
    }

    private static function carouselForm(): Component
    {
        return Fieldset::make(__('attributes.carousel'))
            ->label(__('attributes.carousel'))
            ->visible(fn(Get $get) => $get('section_type_id') == SectionType::where('name', 'Carousel')->first()->id)
            ->schema([
                Toggle::make('is_active')
                    ->label(__('attributes.active'))
                    ->default(true),
            ]);
    }

    private static function contactForm(): Component
    {
        return Fieldset::make(__('attributes.contact'))
            ->label(__('attributes.contact'))
            ->visible(fn(Get $get) => $get('section_type_id') == SectionType::where('name', 'Contact')->first()->id)
            ->schema([
                Toggle::make('is_active')
                    ->label(__('attributes.active'))
                    ->default(true),
            ]);
    }
}
