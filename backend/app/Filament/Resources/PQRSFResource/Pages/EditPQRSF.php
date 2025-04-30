<?php

namespace App\Filament\Resources\PQRSFResource\Pages;

use App\Filament\Resources\PQRSFResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPQRSF extends EditRecord
{
    protected static string $resource = PQRSFResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
