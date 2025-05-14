<?php

namespace App\Filament\Usuario\Resources\NotaResource\Pages;

use App\Filament\Usuario\Resources\NotaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNotas extends ListRecords
{
    protected static string $resource = NotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
