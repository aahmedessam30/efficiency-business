<?php

namespace App\Traits;

use App\Models\SectionType;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Illuminate\Support\Str;

trait SectionForms
{
    use SharedComponents;

    private static array $sectionTypes = [
        'Hero',
        'Carousel',
        'Contact',
    ];

    public static function getSectionFields(): array
    {
        return array_map(fn($sectionType) => static::{lcfirst(Str::camel($sectionType)) . 'Form'}(), static::$sectionTypes);
    }

    private static function heroForm(): Component
    {
        return Fieldset::make(__('attributes.hero'))
            ->label(__('attributes.hero'))
            ->visible(fn(Get $get) => $get('section_type_id') == SectionType::active()->is('Hero')->first()->id)
            ->schema([
                TextInput::make('title')
                    ->label(__('attributes.title'))
                    ->autofocus()
                    ->maxLength(255)
                    ->required(),

                TextInput::make('subtitle')
                    ->label(__('attributes.subtitle'))
                    ->maxLength(255),

                Radio::make('title_alignment')
                    ->label(__('attributes.title_alignment'))
                    ->options([
                        'left' => __('attributes.left'),
                        'center' => __('attributes.center'),
                        'right' => __('attributes.right'),
                    ])
                    ->inline()
                    ->inlineLabel(false)
                    ->default('center'),

                Radio::make('subtitle_alignment')
                    ->label(__('attributes.subtitle_alignment'))
                    ->options([
                        'left' => __('attributes.left'),
                        'center' => __('attributes.center'),
                        'right' => __('attributes.right'),
                    ])
                    ->inline()
                    ->inlineLabel(false)
                    ->default('center'),

                ...static::setLabel('image', 'background_image')->getSharedComponents(['image', 'overlay', 'button', 'video']),
            ]);
    }

    private static function carouselForm(): Component
    {
        return Fieldset::make(__('attributes.carousel'))
            ->label(__('attributes.carousel'))
            ->visible(fn(Get $get) => $get('section_type_id') == SectionType::active()->is('Carousel')->first()->id)
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
            ->visible(fn(Get $get) => $get('section_type_id') == SectionType::active()->is('Contact')->first()->id)
            ->schema([
                Toggle::make('is_active')
                    ->label(__('attributes.active'))
                    ->default(true),
            ]);
    }
}
