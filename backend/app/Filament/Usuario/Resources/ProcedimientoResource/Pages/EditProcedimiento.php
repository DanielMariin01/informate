<?php

namespace App\Filament\Usuario\Resources\ProcedimientoResource\Pages;

use App\Filament\Usuario\Resources\ProcedimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcedimiento extends EditRecord
{
    protected static string $resource = ProcedimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
