<?php

namespace App\Filament\Resources\MedicoProcedimientoSedeResource\Pages;

use App\Filament\Resources\MedicoProcedimientoSedeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicoProcedimientoSedes extends ListRecords
{
    protected static string $resource = MedicoProcedimientoSedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
