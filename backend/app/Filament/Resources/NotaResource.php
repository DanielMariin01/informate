<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotaResource\Pages;
use App\Filament\Resources\NotaResource\RelationManagers;
use App\Models\Nota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
class NotaResource extends Resource
{
    protected static ?string $model = Nota::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                   Forms\Components\TextInput::make('titulo')
                ->label('Título')
                ->required()
                ->maxLength(255), // Limita el título a 255 caracteres

            Forms\Components\Textarea::make('descripcion')
                ->label('Descripción')
                ->required()
                ->maxLength(1000), // Limita la descripción a 

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('titulo')
                ->label('Título')
                ->sortable()
                ->searchable(), // Permite ordenar y buscar por este campo

            Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripción')
                ->limit(50) // Limita la cantidad de caracteres mostrados en la tabla
                ->sortable()
                ->searchable(), // Permite ordenar y buscar por este campo

            Tables\Columns\TextColumn::make('created_at')
                ->label('Fecha de creación')
                ->dateTime('d/m/Y H:i') // Formato de fecha y hora
                ->sortable(), // Permite ordenar por este campo
            
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Fecha de actualizacion')
                ->dateTime('d/m/Y H:i') // Formato de fecha y hora
                ->sortable(), // Permite ordenar por este campo
            
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
            'index' => Pages\ListNotas::route('/'),
            'create' => Pages\CreateNota::route('/create'),
            'edit' => Pages\EditNota::route('/{record}/edit'),
        ];
    }
}
