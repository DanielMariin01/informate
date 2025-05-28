<?php

namespace App\Filament\Resources\HorarioMedicoResource\Widgets;

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use App\Models\Horario_medico;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Saade\FilamentFullCalendar\Actions\EditAction;
use Saade\FilamentFullCalendar\Actions\DeleteAction;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Action; // <-- Esta es la importación correcta para Action
use Filament\Forms\Components\TextInput; // Esta es la importación correcta para TextInput
use Filament\Notifications\Notification;
use Carbon\Carbon; // Importa Notification para el ejemplo
//use del modelo sede 
use App\Models\Sede; // Asegúrate de que este modelo exista y esté correctamente importado
use Filament\Forms\Components\Select; // <--- Esta sí es necesaria para el modal

use Illuminate\Database\Eloquent\Builder;

class CalendarWidget extends FullCalendarWidget
{
    use InteractsWithForms; // Mantén este trait para el modal

    public Model|string|null $model = Horario_medico::class;

    public ?string $medicoFilterId = null; // Cambiamos el nombre para evitar conflictos
    public ?int $selectedSedeId = null; // Para el filtro de sede
 protected function headerActions(): array
    {
        return [
            // Botón que despliega la modal con el Select de la sede
            Action::make('filterBySede')
                // La etiqueta del botón mostrará la sede seleccionada o 'Filtrar por Sede'.
                ->label(fn () => $this->selectedSedeId ? 'Sede: ' . Sede::find($this->selectedSedeId)->nombre : 'Filtrar por Sede')
                ->icon('heroicon-o-building-office-2')
                ->color('info')
                ->modalWidth('md') // Ancho de la modal para el select
                ->form([
                    Select::make('selectedSedeId') // El nombre del campo debe coincidir con la propiedad
                        ->label('Seleccionar Sede')
                        ->placeholder('Todas las Sedes') // Opción para no filtrar
                        ->options(
                            Sede::pluck('nombre', 'id_sede')->toArray()
                        )
                        ->searchable()
                        ->default($this->selectedSedeId) // Mantiene la selección actual
                        ->reactive() // Hace que el select actualice su estado internamente al cambiar
                        // El afterStateUpdated no es estrictamente necesario aquí si la lógica de recarga
                        // está en el action() principal al enviar la modal.
                        // Sin embargo, si quieres una respuesta más instantánea dentro de la modal
                        // (aunque el calendario no se recargue hasta que cierres la modal), podrías usarlo.
                ])
                ->action(function (array $data) {
                    // Esta función se ejecuta cuando el usuario envía el formulario de la modal (ej. clic en "Confirmar").

                    // 1. Sincroniza la propiedad pública del widget con el valor seleccionado del formulario.
                    $this->selectedSedeId = $data['selectedSedeId'];

                    // 2. Muestra una notificación al usuario.
                    Notification::make()
                        ->title('Filtro de sede aplicado')
                        ->body('Eventos filtrados por la sede: ' . ($this->selectedSedeId ? Sede::find($this->selectedSedeId)->nombre : 'Todas las Sedes'))
                        ->success()
                        ->send();

                    // 3. ¡Recarga el calendario con los nuevos filtros!
                    // Esta línea es la que dispara una nueva llamada a `fetchEvents()`.
                    $this->refreshRecords();
                }),
        ];
    }
    //protected function headerActions(): array
   // {
        //return [
            // Botón de búsqueda personalizado
            //Action::make('searchEvents') // Nombre único para la acción
                //->label('Buscar Eventos') // Etiqueta del botón
                //->icon('heroicon-o-magnifying-glass') // Icono del botón (opcional)
                //->color('info') // Color del botón (opcional: primary, secondary, success, danger, warning, info)
               // ->form([ // Define el formulario que se mostrará en la modal
                   // //TextInput::make('search_term')
                        //->label('Término de Búsqueda')
                       // //->placeholder('Ej: Reunión, Proyecto X')
                        //->autofocus(),
                //])
                //>action(function (array $data) {
                    // Aquí iría la lógica para manejar la búsqueda.
                    // $data['search_term'] contendrá lo que el usuario escribió.
                    // Normalmente, querrías recargar el calendario con los eventos filtrados.
                    // Esto es un ejemplo, la implementación real de la búsqueda dependerá de cómo la manejes.
                    //\Filament\Notifications\Notification::make()
                        //>title('Buscando eventos')
                        //->body('Término de búsqueda: "' . $data['search_term'] . '"')
                        //->success()
                        //->send();

                    // Para recargar el calendario con los resultados de la búsqueda,
                    // necesitarías un mecanismo para pasar el término de búsqueda al método
                    // que carga los eventos del calendario (probablemente un query scope en el modelo).
                    // Por ejemplo, podrías emitir un evento Livewire o redirigir con parámetros.
                //}),
        //];
    //}
  

    public function getFormSchema(): array
    {
 
        return [
            Grid::make(2)
                ->schema([
                    Select::make('fk_medico') // Usa Select de Filament\Forms\Components
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
            // ... el resto de tu esquema de formulario
            Grid::make(2)
                ->schema([
                    DatePicker::make('fecha_inicio')
                        ->label('Fecha de Inicio')
                        ->default(fn ($record) => $record?->fecha_inicio ?? null)
                        ->required(),

                    TimePicker::make('hora_inicio')
                        ->label('Hora de Inicio')
                        ->default(fn ($record) => $record?->hora_inicio ?? null)
                        ->required(),

                    DatePicker::make('fecha_fin')
                        ->label('Fecha de Fin')
                        ->default(fn ($record) => $record?->fecha_fin ?? null)
                        ->required(),

                    TimePicker::make('hora_fin')
                        ->label('Hora de Fin')
                        ->default(fn ($record) => $record?->hora_fin ?? null)
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
        $query = Horario_medico::query()
            // Filtrar por rango de fechas del calendario
            ->where('fecha_inicio', '>=', Carbon::parse($fetchInfo['start'])->toDateString()) // Convertir a string de fecha
            ->where('fecha_fin', '<=', Carbon::parse($fetchInfo['end'])->toDateString());   // Convertir a string de fecha

        // Aplicar el filtro por sede si se ha seleccionado una
        // Asumimos que tienes una columna `fk_sede` en tu tabla `horarios_medicos`
        if ($this->selectedSedeId) {
            $query->where('fk_sede', $this->selectedSedeId);
        }

        $horarios = $query->get();

        return $horarios
            ->map(fn (Horario_medico $horario) => [
                'id' => $horario->id_horario_medico,
                // Combina médico y sede en el título
                'title' => ($horario->medico->nombre ?? 'N/A') . ' - ' . ($horario->sede->nombre ?? 'N/A') . ' (' .
                            Carbon::createFromFormat('H:i:s', $horario->hora_inicio)->format('g:i a') . ' - ' .
                            Carbon::createFromFormat('H:i:s', $horario->hora_fin)->format('g:i a') . ')',
                // Asegúrate de que las fechas y horas estén en el formato ISO 8601 (YYYY-MM-DDTHH:MM:SS)
                'start' => $horario->fecha_inicio . 'T' . $horario->hora_inicio,
                'end' => $horario->fecha_fin . 'T' . $horario->hora_fin,
                'color' => $horario->color, // Si tienes un campo 'color' en tu modelo Horario_medico
                // Opcional: descripción
                'description' => 'Creado por: ' . ($horario->createdBy->name ?? 'N/A') .
                                 ', Actualizado por: ' . ($horario->updatedBy->name ?? 'N/A'),
            ])
            ->all(); // all() es equivalente a toArray() para colecciones
    }
    protected function modalActions(): array
    {
        // ... (tu código existente para modalActions)
        return [
            EditAction::make()
                ->mountUsing(
                    function (Horario_medico $record, Form $form, array $arguments) {
                        $form->fill([
                            'id' => $record->id_horario_medico,
                            'fk_medico' => $record->fk_medico,
                            'fk_sede' => $record->fk_sede,
                            'fecha_inicio' => $arguments['event']['start']?? $record->fecha_inicio,
                            'fecha_fin' => $arguments['event']['end'] ?? $record->fecha_fin,
                            'hora_inicio' => $record->hora_inicio,
                            'hora_fin' => $record->hora_fin,
                            'color' => $record->color,
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

    public function config(): array
    {
        return [
            'initialView' => 'timeGridWeek',
            'slotDuration' => '00:30:00',
            'slotLabelInterval' => '00:30',
            'allDaySlot' => false,
            'slotMinTime' => '00:00:00',
            'slotMaxTime' => '23:00:00',
            'expandRows' => false,
            'slotLabelFormat' => [
                'hour' => 'numeric',
                'minute' => '2-digit',
                'hour12' => true,
            ],
            





        ];
    }
}