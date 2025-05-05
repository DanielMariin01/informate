<?php

namespace App\Filament\Usuario\Resources\TiempoRNMResource\Pages;

use App\Filament\Usuario\Resources\TiempoRNMResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTiempoRNMS extends ListRecords
{
    protected static string $resource = TiempoRNMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
