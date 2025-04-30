<?php

namespace App\Filament\Resources\ContratacionClienteResource\Pages;

use App\Filament\Resources\ContratacionClienteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContratacionCliente extends EditRecord
{
    protected static string $resource = ContratacionClienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
