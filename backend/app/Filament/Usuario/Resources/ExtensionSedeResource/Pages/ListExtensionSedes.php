<?php

namespace App\Filament\Usuario\Resources\ExtensionSedeResource\Pages;

use App\Filament\Usuario\Resources\ExtensionSedeResource;
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
