<?php

namespace App\Filament\Resources\HorarioMedicoResource\Pages;

use App\Filament\Resources\HorarioMedicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHorarioMedico extends CreateRecord
{
    protected static string $resource = HorarioMedicoResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['created_by'] = auth()->id();
    $data['updated_by'] = auth()->id();
    return $data;
}

}
