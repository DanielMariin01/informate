<?php

namespace App\Filament\Resources\ExtensionSedeResource\Pages;

use App\Filament\Resources\ExtensionSedeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExtensionSedes extends ListRecords
{
    protected static string $resource = ExtensionSedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
