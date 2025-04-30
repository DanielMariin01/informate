<?php

namespace App\Filament\Resources\AutorizacionPorSedeResource\Pages;

use App\Filament\Resources\AutorizacionPorSedeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAutorizacionPorSede extends EditRecord
{
    protected static string $resource = AutorizacionPorSedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
