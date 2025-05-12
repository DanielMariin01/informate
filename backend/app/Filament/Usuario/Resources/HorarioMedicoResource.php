<?php

namespace App\Filament\Usuario\Resources;

use App\Filament\Usuario\Resources\HorarioMedicoResource\Pages;
use App\Models\Horario_medico;
use App\Models\HorarioMedico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;




class HorarioMedicoResource extends Resource
{
    protected static ?string $model = Horario_medico::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Guia de agendamiento'; 

    protected static ?string $label = 'Horario Médico';
 public static function getActions(): array
    {
        // Devuelve un array vacío para eliminar el botón de creación
        return [];
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('fk_medico')
                ->relationship('medico', 'nombre')
                ->required()
                ->searchable()
                ->preload(),
                Select::make('fk_sede')
                ->relationship('sede', 'nombre')
                ->required()
                ->searchable()
                ->preload(),
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->label('Fecha Inicio')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_fin')
                    ->label('Fecha Fin')
                    ->required(),
                Forms\Components\TimePicker::make('hora_inicio')
                    ->label('Hora Inicio')
                    ->required(),
                Forms\Components\TimePicker::make('hora_fin')
                    ->label('Hora Fin')
                    ->required(),
                Forms\Components\ColorPicker::make('color')
                    ->label('Color'),
            ]);
    }
  


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('medico.nombre')
                ->label('Médico')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('sede.nombre')
                ->label('Sede')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('fecha_inicio')
                ->label('Fecha Inicio')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('fecha_fin')
                ->label('Fecha Fin')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('hora_inicio')
                ->label('Hora Inicio')
                ->time('h:i A')
                ->sortable(),
            Tables\Columns\TextColumn::make('hora_fin')
                ->label('Hora Fin')
                ->time('h:i A')
                ->sortable(),
            Tables\Columns\ColorColumn::make('color')
                ->label('Color'),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('fk_sede')
                ->relationship('sede', 'nombre')
                ->label('Sede')
                ->multiple()
                ->preload(),
            Tables\Filters\SelectFilter::make('fk_medico')
                ->relationship('medico', 'nombre')
                ->label('Médico')
                ->multiple()
                ->preload(),
        ])
        ->actions([
            // Solo se permite la acción de edición
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

  public static function getPages(): array
    {
        return [
            'index' => Pages\ListHorarioMedicos::route('/'),
          
            'edit' => Pages\EditHorarioMedico::route('/{record}/edit'),
        ];
    }
}
