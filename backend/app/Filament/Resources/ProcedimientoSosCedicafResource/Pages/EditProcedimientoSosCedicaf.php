<?php

namespace App\Filament\Resources\ProcedimientoSosCedicafResource\Pages;

use App\Filament\Resources\ProcedimientoSosCedicafResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcedimientoSosCedicaf extends EditRecord
{
    protected static string $resource = ProcedimientoSosCedicafResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
