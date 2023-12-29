<?php

namespace App\Traits;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Illuminate\Support\Str;

trait SharedComponents
{
    protected static array $componentsLabels = [];
    protected static array $sharedComponents = ['image', 'overlay', 'button', 'video',
//        'audio', 'iframe'
    ];

    public static function setLabel($attribute, $label): static
    {
        static::$componentsLabels[self::lcfirstCamel($attribute)] = $label;
        return new static;
    }

    private static function getComponentLabel($key): string
    {
        return __('attributes.' . (array_key_exists($key, static::$componentsLabels) ? static::$componentsLabels[$key] : $key));
    }

    protected static function lcfirstCamel($string): string
    {
        return lcfirst(Str::camel($string));
    }

    private static function getSharedComponentsArray($components = null): array
    {
        return $components ? array_intersect(static::$sharedComponents, $components) : static::$sharedComponents;
    }

    public static function getSharedComponentOptions($components = null): array
    {
        $options = [];

        foreach (static::getSharedComponentsArray($components) as $component) {
            $attribute = in_array($component, array_keys(static::$componentsLabels)) ? static::$componentsLabels[$component] : $component;
            $options[$component] = __('attributes.' . lcfirst($attribute));
        }

        return $options;
    }

    public static function getSharedComponents($components = null): array
    {
        return [
            Select::make('components')
                ->label(__('attributes.components'))
                ->placeholder(__('attributes.select_component_to_add_to_section'))
                ->options(static::getSharedComponentOptions())
                ->columnSpanFull()
                ->live()
                ->multiple(),

            static::backgroundColorComponent(),

            ...array_map(fn($component) => static::{self::lcfirstCamel($component) . 'Component'}()->visible(fn(Get $get) => in_array($component, $get('components'))), static::getSharedComponentsArray($components)),
        ];
    }

    public static function backgroundColorComponent(): Component
    {
        return ColorPicker::make('background_color')
            ->label(__('attributes.background_color'))
            ->columnSpanFull()
            ->visible(fn(Get $get) => !in_array('image', $get('components')));
    }

    public static function imageComponent($relation = 'image'): Component
    {
        return Fieldset::make('image')
            ->columns(1)
            ->label(self::getComponentLabel('image'))
            ->when($relation, fn(Fieldset $fieldset) => $fieldset->relationship($relation))
            ->schema([
                SpatieMediaLibraryFileUpload::make('src')
                    ->label(__('attributes.image'))
                    ->image()
                    ->rules('image'),

                TextInput::make('alt')
                    ->label(__('attributes.alt'))
                    ->maxLength(255),

                TextInput::make('width')
                    ->label(__('attributes.width'))
                    ->maxLength(255)
                    ->hint(__('attributes.leave_empty_to_make_it_full', ['attribute' => __('attributes.width')])),

                TextInput::make('height')
                    ->label(__('attributes.height'))
                    ->maxLength(255)
                    ->hint(__('attributes.leave_empty_to_make_it_full', ['attribute' => __('attributes.height')])),

                Toggle::make('is_active')
                    ->label(__('attributes.is_active', ['attribute' => __('attributes.image')]))
                    ->default(true),
            ]);
    }

    public static function overlayComponent(): Component
    {
        return ColorPicker::make('overlay')
            ->label(self::getComponentLabel('overlay'))
            ->columnSpanFull();
    }

    public static function buttonComponent($relation = 'button'): Component
    {
        return Fieldset::make('button')
            ->columnSpanFull()
            ->label(self::getComponentLabel('button'))
            ->when($relation, fn(Fieldset $fieldset) => $fieldset->relationship($relation))
            ->schema([
                TextInput::make('text')
                    ->label(__('attributes.text'))
                    ->maxLength(255)
                    ->required(),

                TextInput::make('href')
                    ->label(__('attributes.url'))
                    ->maxLength(255)
                    ->required(),

                ColorPicker::make('text_color')
                    ->label(__('attributes.text_color'))
                    ->columnSpanFull(),

                ColorPicker::make('background_color')
                    ->label(__('attributes.background_color'))
                    ->columnSpanFull(),

                ColorPicker::make('border_color')
                    ->label(__('attributes.border_color'))
                    ->columnSpanFull(),

                Select::make('target')
                    ->label(__('attributes.target'))
                    ->options([
                        '_self' => __('attributes.same_tab'),
                        '_blank' => __('attributes.new_tab'),
                    ])
                    ->default('_self'),

                Select::make('text_alignment')
                    ->label(__('attributes.text_alignment'))
                    ->options([
                        'left' => __('attributes.left'),
                        'center' => __('attributes.center'),
                        'right' => __('attributes.right'),
                    ])
                    ->default('center'),

                Toggle::make('has_icon')
                    ->label(__('attributes.has_icon'))
                    ->live()
                    ->default(false),

                static::iconComponent()->visible(fn(Get $get) => $get('has_icon')),

                Toggle::make('is_active')
                    ->label(__('attributes.is_active', ['attribute' => __('attributes.button')]))
                    ->default(true),
            ]);
    }

    public static function iconComponent(): Component
    {
        return Fieldset::make('icon')
            ->columns(1)
            ->label(__('attributes.icon'))
            ->schema([
                SpatieMediaLibraryFileUpload::make('icon')
                    ->label(__('attributes.icon'))
                    ->image()
                    ->rules('image'),

                TextInput::make('icon_width')
                    ->label(__('attributes.width'))
                    ->maxLength(255)
                    ->hint(__('attributes.leave_empty_to_make_it_full', ['attribute' => __('attributes.width')])),

                TextInput::make('icon_height')
                    ->label(__('attributes.height'))
                    ->maxLength(255)
                    ->hint(__('attributes.leave_empty_to_make_it_full', ['attribute' => __('attributes.height')])),

                Select::make('icon_alignment')
                    ->label(__('attributes.text_alignment'))
                    ->options([
                        'left' => __('attributes.left'),
                        'center' => __('attributes.center'),
                        'right' => __('attributes.right'),
                    ])
                    ->default('center'),

                Toggle::make('is_icon_active')
                    ->label(__('attributes.is_active', ['attribute' => __('attributes.icon')]))
                    ->default(true),
            ]);
    }

    public static function videoComponent($relation = 'video'): Component
    {
        return Fieldset::make('video')
            ->label(self::getComponentLabel('video'))
            ->when($relation, fn(Fieldset $fieldset) => $fieldset->relationship($relation))
            ->columns(1)
            ->schema([
                TextInput::make('src')
                    ->label(__('attributes.video'))
                    ->maxLength(255)
                    ->required(),

                TextInput::make('width')
                    ->label(__('attributes.width'))
                    ->maxLength(255)
                    ->hint(__('attributes.leave_empty_to_make_it_full', ['attribute' => __('attributes.width')])),

                TextInput::make('height')
                    ->label(__('attributes.height'))
                    ->maxLength(255)
                    ->hint(__('attributes.leave_empty_to_make_it_full', ['attribute' => __('attributes.height')])),

                Toggle::make('is_active')
                    ->label(__('attributes.is_active', ['attribute' => __('attributes.video')]))
                    ->default(true),
            ]);
    }
}
