<?php

namespace App\Filament\Usuario\Resources\ProcedimientoSOSCedicafResource\Pages;

use App\Filament\Usuario\Resources\ProcedimientoSOSCedicafResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcedimientoSOSCedicaf extends EditRecord
{
    protected static string $resource = ProcedimientoSOSCedicafResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
