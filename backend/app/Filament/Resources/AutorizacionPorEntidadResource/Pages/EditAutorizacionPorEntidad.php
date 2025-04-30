<?php

namespace App\Filament\Resources\AutorizacionPorEntidadResource\Pages;

use App\Filament\Resources\AutorizacionPorEntidadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAutorizacionPorEntidad extends EditRecord
{
    protected static string $resource = AutorizacionPorEntidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
