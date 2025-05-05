<?php

namespace App\Filament\Usuario\Resources\PGPSuraResource\Pages;

use App\Filament\Usuario\Resources\PGPSuraResource;
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
