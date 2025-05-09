<?php

namespace App\Filament\Usuario\Resources\HorarioMedicoResource\Pages;

use App\Filament\Usuario\Resources\HorarioMedicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHorarioMedico extends EditRecord
{
    protected static string $resource = HorarioMedicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
