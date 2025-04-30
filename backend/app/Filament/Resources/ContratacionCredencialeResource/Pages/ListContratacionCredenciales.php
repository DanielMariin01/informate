<?php

namespace App\Filament\Resources\ContratacionCredencialeResource\Pages;

use App\Filament\Resources\ContratacionCredencialeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContratacionCredenciales extends ListRecords
{
    protected static string $resource = ContratacionCredencialeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
