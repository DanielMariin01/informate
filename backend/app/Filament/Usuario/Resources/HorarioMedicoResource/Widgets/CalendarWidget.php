<?php

namespace App\Filament\Usuario\Resources\HorarioMedicoResource\Widgets;

use Filament\Widgets\Widget;
use App\Models\Horario_medico;
use Filament\Forms\Components\ColorPicker;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Saade\FilamentFullCalendar\Actions\EditAction;
use Saade\FilamentFullCalendar\Actions\DeleteAction;
use Filament\Forms\Form;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public Model|string|null $model = Horario_medico::class;

     public function fetchEvents(array $fetchInfo): array
    {
        return Horario_medico::query()
            ->where('fecha_inicio', '>=', $fetchInfo['start'])
            ->where('fecha_fin', '<=', $fetchInfo['end'])
            ->get()
            ->map(fn (Horario_medico $horario) => [
                'id' => $horario->id_horario_medico,
                'title' => $horario->medico->nombre . ' - ' . $horario->sede->nombre . ' (' . 
                           \Carbon\Carbon::createFromFormat('H:i:s', $horario->hora_inicio)->format('g:i a') . ' - ' . 
                           \Carbon\Carbon::createFromFormat('H:i:s', $horario->hora_fin)->format('g:i a') . ')',
                'start' => $horario->fecha_inicio . 'T' . $horario->hora_inicio,
                'end' => $horario->fecha_fin . 'T' . $horario->hora_fin,
                'color' => $horario->color,
                'description' => 'Creado por: ' . ($horario->createdBy->name ?? 'N/A') . 
                                 ', Actualizado por: ' . ($horario->updatedBy->name ?? 'N/A'),
            ])
            ->all();
    }

    protected function modalActions(): array
    {
        // No se permiten acciones de edición ni eliminación
        return [];
    }

    public function isSelectable(): bool
    {
        // Deshabilita la selección de fechas en el calendario
        return false;
    }

    public function isEditable(): bool
    {
        // Deshabilita la edición de eventos en el calendario
        return false;
    }

    public function eventDidMount(): string
    {
        return <<<JS
            function({ event, el }){
                el.setAttribute("x-tooltip", "tooltip");
                el.setAttribute("x-data", "{ tooltip: '"+event.title+"' }");
            }
        JS;
    }
}