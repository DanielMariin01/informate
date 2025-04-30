<?php

namespace App\Filament\Resources\LineaEntidadeResource\Pages;

use App\Filament\Resources\LineaEntidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLineaEntidades extends ListRecords
{
    protected static string $resource = LineaEntidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
