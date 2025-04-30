<?php

namespace App\Filament\Resources\LineaEntidadResource\Pages;

use App\Filament\Resources\LineaEntidadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLineaEntidads extends ListRecords
{
    protected static string $resource = LineaEntidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
