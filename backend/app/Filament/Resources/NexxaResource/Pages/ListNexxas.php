<?php

namespace App\Filament\Resources\NexxaResource\Pages;

use App\Filament\Resources\NexxaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNexxas extends ListRecords
{
    protected static string $resource = NexxaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
