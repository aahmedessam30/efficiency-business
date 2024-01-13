<?php

namespace App\Filament\Admin\Resources\Page;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Models\Page;
use App\Models\SectionType;
use Filament\Forms\Get;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Forms\Components\{Fieldset, Repeater, Section, Select, SpatieMediaLibraryFileUpload, TextInput, Toggle};
use App\Filament\Admin\Resources\Page\PageResource\RelationManagers;
use App\Traits\SectionForms;

class PageResource extends Resource
{
    use Translatable, SectionForms;

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $slug = 'pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('title')
                        ->label(__('attributes.title'))
                        ->autofocus()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, $state) => $set('slug', Str::slug($state)))
                        ->required(),

                    TextInput::make('slug')
                        ->label(__('attributes.slug'))
                        ->required(),

                    Repeater::make('sections')
                        ->label(__('attributes.sections'))
                        ->relationship('sections')
                        ->reorderable()
                        ->reorderableWithButtons()
                        ->collapsible()
                        ->orderColumn('order')
                        ->schema([
                            Select::make('section_type_id')
                                ->label(__('attributes.section_type'))
                                ->options(SectionType::active()->pluck('name', 'id')->toArray())
                                ->placeholder(__('attributes.select_section_type'))
                                ->live()
                                ->required(),

                            Fieldset::make('animation')
                                ->label(__('attributes.section_animation'))
                                ->schema([
                                    Select::make('name')
                                        ->label(__('attributes.animation'))
                                        ->placeholder(__('attributes.select_animation'))
                                        ->options(\App\Models\SectionAnimation::defaultAnimations()),

                                    Select::make('easing')
                                        ->label(__('attributes.easing'))
                                        ->placeholder(__('attributes.select_easing'))
                                        ->options(\App\Models\SectionAnimation::defaultEaseings()),


                                    TextInput::make('delay')
                                        ->label(__('attributes.delay'))
                                        ->placeholder(__('attributes.delay'))
                                        ->type('number')
                                        ->default(300)
                                        ->minLength(0)
                                        ->maxLength(10000),

                                    TextInput::make('duration')
                                        ->label(__('attributes.duration'))
                                        ->placeholder(__('attributes.duration'))
                                        ->type('number')
                                        ->default(1000)
                                        ->minLength(0)
                                        ->maxLength(10000),
                                ]),

                            ...static::getSectionFields(),
                        ]),

                    Toggle::make('is_active')
                        ->label(__('attributes.is_active', ['attribute' => __('attributes.page')]))
                        ->default(true)
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('attributes.title'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label(__('attributes.url'))
                    ->url(fn(Page $page) => route("page.$page->slug"), true)
                    ->formatStateUsing(fn(Page $page) => route("page.$page->slug"))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('attributes.active'))
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('title')
                    ->label(__('attributes.title')),

                Tables\Filters\Filter::make('slug')
                    ->label(__('attributes.url')),

                Tables\Filters\Filter::make('is_active')
                    ->label(__('attributes.active'))
                    ->checkbox(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => PageResource\Pages\ListPages::route('/'),
            'create' => PageResource\Pages\CreatePage::route('/create'),
            'edit' => PageResource\Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
