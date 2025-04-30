<?php

namespace App\Filament\Resources\AutorizacionPorSedeResource\Pages;

use App\Filament\Resources\AutorizacionPorSedeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAutorizacionPorSedes extends ListRecords
{
    protected static string $resource = AutorizacionPorSedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
