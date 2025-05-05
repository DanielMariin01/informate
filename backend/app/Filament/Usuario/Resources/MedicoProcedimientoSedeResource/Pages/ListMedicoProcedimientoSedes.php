<?php

namespace App\Filament\Usuario\Resources\MedicoProcedimientoSedeResource\Pages;

use App\Filament\Usuario\Resources\MedicoProcedimientoSedeResource;
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
