<?php

namespace App\Filament\Usuario\Resources;

use App\Filament\Usuario\Resources\SedeResource\Pages;
use App\Filament\Usuario\Resources\SedeResource\RelationManagers;
use App\Models\Sede;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SedeResource extends Resource
{
    protected static ?string $model = Sede::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
     // Agrupación en el menú de navegación
    protected static ?string $label = 'Sede';  // Etiqueta singular

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')  // Campo para el nombre de la sede
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('fk_empresa')  // Campo para seleccionar la empresa
                    ->relationship('empresa', 'nombre')
                    ->required(),

                Forms\Components\Select::make('fk_ciudad')  // Campo para seleccionar la ciudad
                    ->relationship('ciudad', 'nombre')
                    ->required(),
                Forms\Components\TextInput::make('direccion')  // Campo para la dirección de la sede
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')  // Columna para mostrar el nombre de la sede
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('empresa.nombre')  // Columna para mostrar el nombre de la empresa
                    ->label('Empresa')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('ciudad.nombre')  // Columna para mostrar el nombre de la ciudad
                    ->label('Ciudad')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('direccion')  // Columna para mostrar la dirección de la sede
                    ->searchable()
                    ->sortable(),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('fk_sede')  // Filtro por sede
                ->label('Sede')
                ->searchable()
                ->relationship('sede', 'nombre')
                ->placeholder('Todas las sedes'),
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
            'index' => Pages\ListSedes::route('/'),
            'create' => Pages\CreateSede::route('/create'),
            'edit' => Pages\EditSede::route('/{record}/edit'),
        ];
    }
}
