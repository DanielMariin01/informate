<?php

namespace App\Filament\Resources\HorarioMedicoResource\Pages;

use App\Filament\Resources\HorarioMedicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHorarioMedicos extends ListRecords
{
    protected static string $resource = HorarioMedicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
