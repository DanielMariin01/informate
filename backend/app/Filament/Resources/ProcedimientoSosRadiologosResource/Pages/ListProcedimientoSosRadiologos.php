<?php

namespace App\Filament\Resources\ProcedimientoSosRadiologosResource\Pages;

use App\Filament\Resources\ProcedimientoSosRadiologosResource;
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
