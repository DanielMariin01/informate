<?php

namespace App\Filament\Usuario\Resources\AutorizacionPorEntidadResource\Pages;

use App\Filament\Usuario\Resources\AutorizacionPorEntidadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAutorizacionPorEntidads extends ListRecords
{
    protected static string $resource = AutorizacionPorEntidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
