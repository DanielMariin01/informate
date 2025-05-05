<?php

namespace App\Filament\Usuario\Resources\PGPAsmetResource\Pages;

use App\Filament\Usuario\Resources\PGPAsmetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPGPAsmets extends ListRecords
{
    protected static string $resource = PGPAsmetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
