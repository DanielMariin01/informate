<?php

namespace App\Filament\Resources\LineaEntidadResource\Pages;

use App\Filament\Resources\LineaEntidadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLineaEntidad extends EditRecord
{
    protected static string $resource = LineaEntidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
