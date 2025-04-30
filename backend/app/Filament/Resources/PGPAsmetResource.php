<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PGPAsmetResource\Pages;
use App\Filament\Resources\PGPAsmetResource\RelationManagers;
use App\Models\PGP_Asmet;
use App\Models\PGPAsmet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PGPAsmetResource extends Resource
{
    protected static ?string $model = PGP_Asmet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Instructivo PGP';
    protected static ?string $navigationLabel = 'Contrato Asmet PP';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                    Forms\Components\Select::make('fk_procedimiento')
                        ->relationship('procedimiento', 'nombre')
                        ->required(),
                    Forms\Components\Select::make('fk_ciudad')
                        ->relationship('ciudad', 'nombre')
                        ->required(),
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('procedimiento.especialidad.nombre')
                ->label('Especialidad')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('procedimiento.codigo_resolucion')
                ->label('Código Resolución')
                ->sortable()
                ->searchable(),
              
                Tables\Columns\TextColumn::make('procedimiento.nombre')
                    ->label('Procedimiento')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('ciudad.nombre')
                    ->label('Ciudad')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de Actualización')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultPaginationPageOption(10)
            ->paginationPageOptions([10, 25, 50, 100])
            ->filters([
                //crear filtro por ciudad   
                Tables\Filters\SelectFilter::make('fk_ciudad')
                    ->relationship('ciudad', 'nombre')
                    ->label('Ciudad')
                    ->searchable(),
                Tables\Filters\SelectFilter::make('fk_procedimiento')
                    ->relationship('procedimiento', 'nombre')
                    ->label('Procedimiento'),
                    Tables\Filters\SelectFilter::make('procedimiento.especialidad')
                    ->relationship('procedimiento.especialidad', 'nombre')
                    ->label('Especialidad')
                    ->searchable(),
                
                //crear filtro por coidigo de resolución
                Tables\Filters\SelectFilter::make('codigo_resolucion')
                    ->label('Código Resolución')
                    ->placeholder('Código Resolución')
                    ->searchable()
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
            'index' => Pages\ListPGPAsmets::route('/'),
            'create' => Pages\CreatePGPAsmet::route('/create'),
            'edit' => Pages\EditPGPAsmet::route('/{record}/edit'),
        ];
    }
}
