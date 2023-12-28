<?php

namespace App\Filament\Admin\Resources\Page\PageResource\Pages;

use App\Models\Page;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\Page\PageResource;
use Illuminate\Support\Str;

class CreatePage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = PageResource::class;

    protected function afterCreate(): void
    {
        Page::createPageVueFile($this->record);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
