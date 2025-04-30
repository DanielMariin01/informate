<?php

namespace App\Filament\Resources\PGPSuraResource\Pages;

use App\Filament\Resources\PGPSuraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPGPSura extends EditRecord
{
    protected static string $resource = PGPSuraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
