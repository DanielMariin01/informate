<?php

namespace App\Filament\Resources\ProcedimientoSosCedicafResource\Pages;

use App\Filament\Resources\ProcedimientoSosCedicafResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcedimientoSosCedicafs extends ListRecords
{
    protected static string $resource = ProcedimientoSosCedicafResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
