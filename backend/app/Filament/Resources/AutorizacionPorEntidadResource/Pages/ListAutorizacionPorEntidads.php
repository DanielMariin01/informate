<?php

namespace App\Filament\Resources\AutorizacionPorEntidadResource\Pages;

use App\Filament\Resources\AutorizacionPorEntidadResource;
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
