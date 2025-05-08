<?php

namespace App\Filament\Resources\HorarioMedicoResource\Widgets;

use App\Filament\Resources\HorarioMedicoResource;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use App\Models\Horario_medico;
use Filament\Forms\Components\ColorPicker;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\ComponentContainer;




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
                'id' => $horario->id_horario_medico, // Asegúrate de que este campo exista en tu modelo
                'title' => $horario->medico->nombre . ' - ' . $horario->sede->nombre,
                'start' => $horario->fecha_inicio . 'T' . $horario->hora_inicio, // Formato adecuado para FullCalendar
                'end' => $horario->fecha_fin . 'T' . $horario->hora_fin, // Formato adecuado para FullCalendar
                'color' => $horario->color,
                'description' => 'Creado por: ' . ($horario->createdBy->name ?? 'N/A') . 
                                 ', Actualizado por: ' . ($horario->updatedBy->name ?? 'N/A'),
         // Asegúrate de incluir el 'id' para poder accederlo después
               // Indicamos que la URL debe abrirse en una nueva pestaña
               
            ])
            ->all();
    }


}