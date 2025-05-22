<?php

namespace App\Filament\Resources\HorarioMedicoResource\Pages;

use App\Filament\Resources\HorarioMedicoResource\Widgets\CalendarWidget;
use App\Filament\Resources\HorarioMedicoResource;
use App\Filament\Widgets\CalendarWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
 


class ListHorarioMedicos extends ListRecords
{
    protected static string $resource = HorarioMedicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            WidgetsCalendarWidget::class,
        ];
    }
}
