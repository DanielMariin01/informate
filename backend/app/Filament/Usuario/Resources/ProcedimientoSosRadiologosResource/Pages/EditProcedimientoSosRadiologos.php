<?php

namespace App\Filament\Usuario\Resources\ProcedimientoSosRadiologosResource\Pages;

use App\Filament\Usuario\Resources\ProcedimientoSosRadiologosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcedimientoSosRadiologos extends EditRecord
{
    protected static string $resource = ProcedimientoSosRadiologosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
