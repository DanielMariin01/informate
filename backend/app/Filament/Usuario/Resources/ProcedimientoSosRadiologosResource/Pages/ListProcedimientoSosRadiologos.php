<?php

namespace App\Filament\Usuario\Resources\ProcedimientoSosRadiologosResource\Pages;

use App\Filament\Usuario\Resources\ProcedimientoSosRadiologosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcedimientoSosRadiologos extends ListRecords
{
    protected static string $resource = ProcedimientoSosRadiologosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
