<?php

namespace App\Filament\Usuario\Resources\PQRSFResource\Pages;

use App\Filament\Usuario\Resources\PQRSFResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPQRSFS extends ListRecords
{
    protected static string $resource = PQRSFResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
