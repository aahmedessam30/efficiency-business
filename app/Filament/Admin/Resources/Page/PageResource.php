<?php

namespace App\Filament\Admin\Resources\Page;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Models\Page;
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
use App\Traits\ComponentForms;

class PageResource extends Resource
{
    use Translatable, ComponentForms;

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
                        ->live(debounce: 500)
                        ->afterStateUpdated(fn(Set $set, $state) => $set('slug', Str::slug($state)))
                        ->required(),

                    TextInput::make('slug')
                        ->label(__('attributes.slug'))
                        ->required(),

                    Repeater::make('sections')
                        ->relationship('sections')
                        ->schema([
                            Select::make('section_type_id')
                                ->label(__('attributes.section_type'))
                                ->options(\App\Models\SectionType::pluck('name', 'id')->toArray())
                                ->placeholder(__('forms.actions.select_option'))
                                ->live()
                                ->required(),

                            ...static::getSectionTypeComponentField(),
                        ]),

                    Toggle::make('is_active')
                        ->label(__('attributes.active'))
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
