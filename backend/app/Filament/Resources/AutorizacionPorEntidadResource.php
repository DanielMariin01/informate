<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AutorizacionPorEntidadResource\Pages;
use App\Filament\Resources\AutorizacionPorEntidadResource\RelationManagers;
use App\Models\Autorizacion_por_entidad;
use App\Models\AutorizacionPorEntidad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Laravel\Prompts\search;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class AutorizacionPorEntidadResource extends Resource
{
    protected static ?string $model = Autorizacion_por_entidad::class;
 
    protected static ?string $navigationLabel = 'Autorización por Entidad';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('fk_entidad')  // Campo para seleccionar la entidad
                    ->relationship('entidad', 'nombre')
                    ->required(),
 
                    Forms\Components\TextInput::make('autorizacion')  // Campo para el nombre de la ciudad
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ejemplo')  // Campo para el nombre de la ciudad
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('observacion')  // Campo para el nombre de la ciudad
                    ->required()
                    ->maxLength(255),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('entidad.nombre')  // Columna para mostrar el nombre de la entidad
                    ->label('Entidad')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('autorizacion')  // Columna para mostrar el nombre de la autorización
                    ->label('Autorización')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('ejemplo')  // Columna para mostrar el nombre de la autorización
                    ->label('Ejemplo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('observacion')  // Columna para mostrar el nombre de la autorización
                    ->label('Observación')
                    ->searchable()
                    ->sortable(),

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
            'index' => Pages\ListAutorizacionPorEntidads::route('/'),
            'create' => Pages\CreateAutorizacionPorEntidad::route('/create'),
            'edit' => Pages\EditAutorizacionPorEntidad::route('/{record}/edit'),
        ];
    }
}
