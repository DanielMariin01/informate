<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NexxaResource\Pages;
use App\Filament\Resources\NexxaResource\RelationManagers;
use App\Models\Nexxa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class NexxaResource extends Resource
{
    protected static ?string $model = Nexxa::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $label = 'Estado De Resultados Nexxa ';  // Etiqueta singular

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo_estado')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('estado_nexxa_aquila')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('descripcion')
                ->required(),
            Forms\Components\Textarea::make('escalamiento_realizar')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
             
                Tables\Columns\TextColumn::make('codigo_estado')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado_nexxa_aquila')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('escalamiento_realizar')
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
            'index' => Pages\ListNexxas::route('/'),
            'create' => Pages\CreateNexxa::route('/create'),
            'edit' => Pages\EditNexxa::route('/{record}/edit'),
        ];
    }
}
