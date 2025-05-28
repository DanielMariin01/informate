<?php

namespace App\Filament\Resources\HorarioMedicoResource\Pages;

use App\Filament\Resources\HorarioMedicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\HorarioMedicoResource\Widgets\CalendarWidget;

use App\Filament\Resources\HorarioMedicoResource\Widgets\MedicoFilterWidget;

class ListHorarioMedicos extends ListRecords
{
    protected static string $resource = HorarioMedicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Crear horario_medico'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CalendarWidget::class,
            // ¡Añade tu nuevo widget contenedor aquí!

        ];
    }

  
}