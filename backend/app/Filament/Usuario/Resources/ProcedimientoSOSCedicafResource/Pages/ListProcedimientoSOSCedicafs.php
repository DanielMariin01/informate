<?php

namespace App\Filament\Usuario\Resources\ProcedimientoSOSCedicafResource\Pages;

use App\Filament\Usuario\Resources\ProcedimientoSOSCedicafResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcedimientoSOSCedicafs extends ListRecords
{
    protected static string $resource = ProcedimientoSOSCedicafResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
