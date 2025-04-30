<?php

namespace App\Filament\Resources\ExtensionSedeResource\Pages;

use App\Filament\Resources\ExtensionSedeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExtensionSede extends EditRecord
{
    protected static string $resource = ExtensionSedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
