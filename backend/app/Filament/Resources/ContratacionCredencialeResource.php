<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContratacionCredencialeResource\Pages;
use App\Filament\Resources\ContratacionCredencialeResource\RelationManagers;
use App\Models\Contratacion_credenciale;
use App\Models\ContratacionCredenciale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContratacionCredencialeResource extends Resource
{
    protected static ?string $model = Contratacion_credenciale::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cliente_anterior')
                    ->label('Cliente Anterior')
                    ->required(),
                Forms\Components\TextInput::make('cliente_nuevo')
                    ->label('Cliente Nuevo')
                    ->required(),
                Forms\Components\Select::make('fk_empresa')  // Campo para seleccionar la empresa
                    ->relationship('empresa', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_ciudad')  // Campo para seleccionar la ciudad
                    ->relationship('ciudad', 'nombre')
                    ->required(),
                Forms\Components\TextInput::make('codigo_cliente')
                    ->label('Código Cliente')
                    ->required(),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->nullable(),
                Forms\Components\Textarea::make('soporte')  // Campo para subir el soporte
                    ->label('Soporte')
                    ->nullable(),
             
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cliente_anterior')
                    ->label('Cliente Anterior')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('cliente_nuevo')
                    ->label('Cliente Nuevo')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('empresa.nombre')
                    ->label('Empresa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ciudad.nombre')
                    ->label('Ciudad')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_cliente')
                    ->label('Código Cliente')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->sortable()
                    ->searchable(),
                    Tables\Columns\TextColumn::make('soporte')
                    ->label('Soporte')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListContratacionCredenciales::route('/'),
            'create' => Pages\CreateContratacionCredenciale::route('/create'),
            'edit' => Pages\EditContratacionCredenciale::route('/{record}/edit'),
        ];
    }
}
