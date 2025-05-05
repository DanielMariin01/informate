<?php

namespace App\Filament\Usuario\Resources\ContratacionCredencialeResource\Pages;

use App\Filament\Usuario\Resources\ContratacionCredencialeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContratacionCredenciale extends EditRecord
{
    protected static string $resource = ContratacionCredencialeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
