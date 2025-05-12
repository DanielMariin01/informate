<?php

namespace App\Filament\Usuario\Resources\HorarioMedicoResource\Pages;

use App\Filament\Usuario\Resources\HorarioMedicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
//hacer el use de widgets 
use App\Filament\Usuario\Resources\HorarioMedicoResource\Widgets\CalendarWidget; 
class ListHorarioMedicos extends ListRecords
{
    protected static string $resource = HorarioMedicoResource::class;

   protected function getHeaderActions(): array
    {
        // Devuelve un array vacío para eliminar el botón de creación
        return [];
    }
       protected function getActions(): array
    {
        // Devuelve un array vacío para eliminar cualquier acción predeterminada
        return [];
    }
      protected function getHeaderWidgets(): array
    {
        return [
            CalendarWidget::class,
        ];
    }
    
}
