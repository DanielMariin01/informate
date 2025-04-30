<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExtensionSedeResource\Pages;
use App\Filament\Resources\ExtensionSedeResource\RelationManagers;
use App\Models\Extension_sede;
use App\Models\ExtensionSede;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExtensionSedeResource extends Resource
{
    protected static ?string $model = Extension_sede::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('fk_sede')
                ->relationship('sede', 'nombre')
                ->required(),
               Forms\Components\TextInput::make('extension')
                ->required()
                ->maxLength(255),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
          
                Tables\Columns\TextColumn::make('sede.nombre')
                    ->label('Sede')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('extension')
                    ->sortable()
                    ->searchable(),
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
                //crear filtro por sede
                Tables\Filters\SelectFilter::make('fk_sede')
                    ->relationship('sede', 'nombre')
                    ->label('Sede')
                    ->multiple()
                    ->searchable(),
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
            'index' => Pages\ListExtensionSedes::route('/'),
            'create' => Pages\CreateExtensionSede::route('/create'),
            'edit' => Pages\EditExtensionSede::route('/{record}/edit'),
        ];
    }
}
