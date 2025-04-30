<?php

namespace App\Filament\Resources\PGPSuraResource\Pages;

use App\Filament\Resources\PGPSuraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPGPSuras extends ListRecords
{
    protected static string $resource = PGPSuraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
