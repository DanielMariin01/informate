<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PGPSuraResource\Pages;
use App\Filament\Resources\PGPSuraResource\RelationManagers;
use App\Models\PGP_Sura;
use App\Models\PGPSura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
 
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PGPSuraResource extends Resource
{
    protected static ?string $model = PGP_Sura::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Instructivo PGP';
    protected static ?string $navigationLabel = 'PGP Sura';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ips_adscrita')
                    ->label('IPS Adscrita')
                    ->required(),
                Forms\Components\Textarea::make('incluye')
                    ->label('Incluye')
                    ->required(),
                Forms\Components\Textarea::make('no_incluye')
                    ->label('No Incluye')
                    ->required(),
                Forms\Components\Textarea::make('observacion')
                    ->label('Observación')
                    ->required(),
                Forms\Components\Select::make('fk_ciudad')
                    ->relationship('ciudad', 'nombre')
                    ->label('Ciudad')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ips_adscrita')
                    ->label('IPS Adscrita')
                    ->sortable()
                    ->searchable(),
                    Tables\Columns\TextColumn::make('ciudad.nombre')
                    ->label('Ciudad')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('incluye')
                    ->label('Incluye')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_incluye')
                    ->label('No Incluye')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('observacion')
                    ->label('Observación')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime()
                    ->sortable(),
             
            ])
            ->filters([
                //crear filtro por ips adscrita
                Tables\Filters\SelectFilter::make('ips_adscrita')
                    ->label('IPS Adscrita'),

                    
                //crear filtro por ciudad
                Tables\Filters\SelectFilter::make('fk_ciudad')
                    ->relationship('ciudad', 'nombre')
                    ->label('Ciudad')
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
            'index' => Pages\ListPGPSuras::route('/'),
            'create' => Pages\CreatePGPSura::route('/create'),
            'edit' => Pages\EditPGPSura::route('/{record}/edit'),
        ];
    }
}
