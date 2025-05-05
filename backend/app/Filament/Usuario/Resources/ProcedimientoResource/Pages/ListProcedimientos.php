<?php

namespace App\Filament\Usuario\Resources\ProcedimientoResource\Pages;

use App\Filament\Usuario\Resources\ProcedimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcedimientos extends ListRecords
{
    protected static string $resource = ProcedimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
