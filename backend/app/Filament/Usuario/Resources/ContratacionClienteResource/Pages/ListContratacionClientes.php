<?php

namespace App\Filament\Usuario\Resources\ContratacionClienteResource\Pages;

use App\Filament\Usuario\Resources\ContratacionClienteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContratacionClientes extends ListRecords
{
    protected static string $resource = ContratacionClienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
