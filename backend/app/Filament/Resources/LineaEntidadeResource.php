<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LineaEntidadeResource\Pages;
use App\Filament\Resources\LineaEntidadeResource\RelationManagers;
use App\Models\Linea_entidade;
use App\Models\LineaEntidade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LineaEntidadeResource extends Resource
{
    protected static ?string $model = Linea_entidade::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('fk_entidad')
                ->relationship('entidad', 'nombre')
                ->required(),
            Forms\Components\TextInput::make('linea')
                ->required(),
            Forms\Components\TextInput::make('autorizacion_fisica')
                ->required(),
            Forms\Components\Textarea::make('observacion')
                ->required(),
            Forms\Components\TextInput::make('valor_sedacion')
                ->required(),
            ]);
                
                
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            
                Tables\Columns\TextColumn::make('entidad.nombre')
                ->label('Entidad')
                ->sortable()
                ->searchable(),
            
                Tables\Columns\TextColumn::make('linea')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('autorizacion_fisica')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('observacion')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('valor_sedacion')
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
            'index' => Pages\ListLineaEntidades::route('/'),
            'create' => Pages\CreateLineaEntidade::route('/create'),
            'edit' => Pages\EditLineaEntidade::route('/{record}/edit'),
        ];
    }
}
