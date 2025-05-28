<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicoResource\Pages;
use App\Models\Medico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class MedicoResource extends Resource
{
    // Especificamos el modelo asociado
    protected static ?string $model = Medico::class;

    // Icono en la barra de navegación
    protected static ?string $navigationIcon = 'heroicon-o-user';
    // Agrupación en el menú de navegación
    protected static ?string $navigationGroup = 'Administración';  // Agrupación en el menú de navegación

    /**
     * Definir el formulario para agregar/editar médicos
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Definimos los campos del formulario
                Forms\Components\TextInput::make('nombre')  // Campo para el nombre del médico
                    ->required()
                    ->maxLength(255),
                
                // También se pueden agregar otros campos como especialidad, etc. si es necesario
               //orms\Components\TextInput::make('especialidad')
                    //maxLength(255),
            ]);
    }

    /**
     * Definir la tabla para listar los médicos
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Mostramos las columnas en la tabla usando el tipo correcto de columna
                Tables\Columns\TextColumn::make('nombre')  // Columna para mostrar el nombre del médico
                    ->searchable()
                    ->sortable(),

              //Columns\TextColumn::make('especialidad')  // Columna para mostrar la especialidad
               //>searchable()
                   //>sortable(),

                Tables\Columns\TextColumn::make('created_at')  // Columna para mostrar la fecha de creación
                    ->label('Fecha de Creación')
                    ->sortable()
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')  // Columna para mostrar la fecha de última actualización
                    ->label('Última Actualización')
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                // Filtros (opcional)
            ])
            ->actions([
                // Acción para editar el médico
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Acción para eliminar varios médicos a la vez
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                 
                ]),
            ]);
    }

    /**
     * Definir las relaciones (si hubiera alguna, por ejemplo con especialidades o usuarios)
     */
    public static function getRelations(): array
    {
        return [
            // Ejemplo: relaciones con otros modelos (si fuera necesario)
        ];
    }

    /**
     * Definir las páginas de la interfaz
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedicos::route('/'),
            'create' => Pages\CreateMedico::route('/create'),
            'edit' => Pages\EditMedico::route('/{record}/edit'),
        ];
    }
}
