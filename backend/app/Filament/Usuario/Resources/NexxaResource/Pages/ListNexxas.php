<?php

namespace App\Filament\Usuario\Resources\NexxaResource\Pages;

use App\Filament\Usuario\Resources\NexxaResource;
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
