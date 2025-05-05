<?php

namespace App\Filament\Usuario\Resources\LineaEntidadeResource\Pages;

use App\Filament\Usuario\Resources\LineaEntidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLineaEntidade extends EditRecord
{
    protected static string $resource = LineaEntidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
