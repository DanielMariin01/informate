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

    public function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    Select::make('fk_medico')
                        ->label('Médico')
                        ->relationship('medico', 'nombre')
                        ->required()
                        ->searchable()
                        ->preload(),

                    Select::make('fk_sede')
                        ->label('Sede')
                        ->relationship('sede', 'nombre')
                        ->required()
                        ->searchable()
                        ->preload(),
                ]),
            Grid::make(2)
                ->schema([
                    DatePicker::make('fecha_inicio')
                        ->label('Fecha de Inicio')
                        ->default(fn ($record) => $record?->fecha_inicio ?? null) // Solo fecha
                        ->required(),

                    TimePicker::make('hora_inicio')
                        ->label('Hora de Inicio')
                        ->default(fn ($record) => $record?->hora_inicio ?? null) // Solo hora
                        ->required(),

                    DatePicker::make('fecha_fin')
                        ->label('Fecha de Fin')
                        ->default(fn ($record) => $record?->fecha_fin ?? null) // Solo fecha
                        ->required(),

                    TimePicker::make('hora_fin')
                        ->label('Hora de Fin')
                        ->default(fn ($record) => $record?->hora_fin ?? null) // Solo hora
                        ->required(),
                ]),
            ColorPicker::make('color')
                ->label('Color')
                ->default(fn ($record) => $record?->color ?? '#000000')
                ->required(),
        ];
    }
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
     return [
         EditAction::make()
             ->mountUsing(
                 function (Horario_medico $record, Form $form, array $arguments) {
                     $form->fill([
                        'id' => $record->id_horario_medico,
                        'title' => $record->fk_sede,
                        // 'start' => $record->fecha_inicio . 'T' . $record->hora_inicio,
                        // 'end' => $record->fecha_fin . 'T' . $record->hora_fin,
                        'fecha_inicio' => $arguments['event']['start']?? $record->fecha_inicio,

                        'fecha_fin' => $arguments['event']['end'] ?? $record->fecha_fin,

                        'hora_inicio' => $record->hora_inicio,
                        'hora_fin' => $record->hora_fin,
                        'color' => $record->color,
                        'description' => $record->createdBy->name ?? 'N/A' . 
                                         ', Actualizado por: ' . $record->updatedBy->name ?? 'N/A',
                   
                        
                  
                        
                     ]);
                 }
             ),
         DeleteAction::make(),
     ];
 }
 public function eventDidMount(): string
 {
     return <<<JS
         function({ event, timeText, isStart, isEnd, isMirror, isPast, isFuture, isToday, el, view }){
             el.setAttribute("x-tooltip", "tooltip");
             el.setAttribute("x-data", "{ tooltip: '"+event.title+"' }");
         }
     JS;
 } 
}