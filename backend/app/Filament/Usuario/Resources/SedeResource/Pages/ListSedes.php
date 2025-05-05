<?php

namespace App\Filament\Usuario\Resources\SedeResource\Pages;

use App\Filament\Usuario\Resources\SedeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSedes extends ListRecords
{
    protected static string $resource = SedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
