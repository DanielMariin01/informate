<?php

namespace App\Filament\Resources\ProcedimientoSosRadiologosResource\Pages;

use App\Filament\Resources\ProcedimientoSosRadiologosResource;
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
