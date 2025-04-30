<?php

namespace App\Filament\Resources\NexxaResource\Pages;

use App\Filament\Resources\NexxaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNexxa extends EditRecord
{
    protected static string $resource = NexxaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
