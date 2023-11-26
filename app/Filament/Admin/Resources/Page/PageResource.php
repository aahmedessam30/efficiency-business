<?php

namespace App\Filament\Admin\Resources\Page;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Models\Page;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Forms\Components\{Fieldset, Section, SpatieMediaLibraryFileUpload, TextInput, Toggle};
use App\Filament\Admin\Resources\Page\PageResource\RelationManagers;

class PageResource extends Resource
{
    use Translatable;

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

                    SpatieMediaLibraryFileUpload::make('header')
                        ->label(__('attributes.header'))
                        ->live()
                        ->afterStateUpdated(fn(Set $set, $state) => $set('is_header_active', $state !== null))
                        ->collection('pages'),

                    TinyEditor::make('body')
                        ->profile('full')
                        ->direction('auto|rtl|ltr')
                        ->label(__('attributes.body'))
                        ->columnSpan('full')
                        ->required(),

                    Fieldset::make('Actions')
                        ->label(__('attributes.actions'))
                        ->columns(2)
                        ->schema([
                            Toggle::make('is_active')
                                ->label(__('attributes.active_page'))
                                ->default(true)
                                ->required(),

                            Toggle::make('is_header_active')
                                ->label(__('attributes.active_header'))
                                ->default(false)
                                ->required(),
                        ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
