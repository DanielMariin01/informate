<?php

namespace App\Filament\Resources\HorarioMedicoResource\Pages;

use App\Filament\Resources\HorarioMedicoResource;
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
    protected function mutateFormDataBeforeSave(array $data): array
{
    $data['updated_by'] = auth()->id();
    return $data;
}

}
