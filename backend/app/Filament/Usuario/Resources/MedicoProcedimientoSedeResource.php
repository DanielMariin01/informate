<?php

namespace App\Filament\Usuario\Resources;

use App\Filament\Usuario\Resources\MedicoProcedimientoSedeResource\Pages;
use App\Filament\Usuario\Resources\MedicoProcedimientoSedeResource\RelationManagers;
use App\Models\Medico_procedimiento_sede;
use App\Models\MedicoProcedimientoSede;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedicoProcedimientoSedeResource extends Resource
{
    protected static ?string $model = Medico_procedimiento_sede::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';  // Icono de navegación

    // Agrupación en el menú de navegación
       protected static ?string $label = 'Procedimientos por médico y sede';  // Etiqueta singular
         protected static ?string $navigationGroup = 'Guia de agendamiento';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('fk_medico')  // Campo para seleccionar el médico
                ->relationship('medico', 'nombre')
                ->required(),
            Forms\Components\Select::make('fk_procedimiento')  // Campo para seleccionar el procedimiento
                ->relationship('procedimiento', 'nombre')
                ->required() ,
            Forms\Components\Select::make('fk_sede')  // Campo para seleccionar la sede
                ->relationship('sede', 'nombre')
                ->required(),
            Forms\Components\TextInput::make('cupos_diarios')  // Campo para cupos diarios
                ->label('Cupos Diarios')
                ->nullable(),
            Forms\Components\TextInput::make('duracion')  // Campo para duración
                ->label('Duración')
                ->nullable(),
            Forms\Components\Textarea::make('observaciones')  // Campo para observaciones
                ->label('Observaciones')
                ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              
                Tables\Columns\TextColumn::make('medico.nombre')  // Columna para mostrar el nombre del médico
                    ->label('Médico')
                    ->searchable()
                    ->sortable(),
        
                    Tables\Columns\TextColumn::make('procedimiento.codigo_resolucion')  // Columna para mostrar el código radiólogos del procedimiento
                    ->label('Código resolución')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('procedimiento.nombre')  // Columna para mostrar el nombre del procedimiento
                    ->label('Procedimiento')
                    ->searchable()
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('sede.nombre')  // Columna para mostrar el nombre de la sede
                    ->label('Sede')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cupos_diarios')  // Columna para mostrar los cupos diarios
                    ->label('Cupos Diarios')
                    ->sortable(),
                Tables\Columns\TextColumn::make('duracion')  // Columna para mostrar la duración
                    ->label('Duración')
                    ->sortable(),
                Tables\Columns\TextColumn::make('observaciones')  // Columna para mostrar las observaciones
                    ->label('Observaciones')
                    ->limit(50)
                    ->sortable(),
                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('fk_medico')  // Filtro por médico
                ->label('Médico')
                ->searchable()
                ->relationship('medico', 'nombre')
                ->placeholder('Todos los médicos'),
            Tables\Filters\SelectFilter::make('fk_procedimiento')  // Filtro por procedimiento
                ->label('Procedimiento')
                ->searchable()
                ->relationship('procedimiento', 'nombre')
                ->placeholder('Todos los procedimientos'),
            Tables\Filters\SelectFilter::make('fk_sede')  // Filtro por sede
                ->label('Sede')
                ->searchable()
                ->relationship('sede', 'nombre')
                ->placeholder('Todas las sedes'),
                Tables\Filters\SelectFilter::make('procedimiento.codigo_resolucion') // Filtro por código resolución
                ->label('Código Resolución')
                ->searchable()
                ->placeholder('Buscar por código resolución')
                ->relationship('procedimiento', 'codigo_resolucion'),
            ])
            ->actions([
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
            'index' => Pages\ListMedicoProcedimientoSedes::route('/'),
            'create' => Pages\CreateMedicoProcedimientoSede::route('/create'),
            'edit' => Pages\EditMedicoProcedimientoSede::route('/{record}/edit'),
        ];
    }
}
