<?php

namespace App\Filament\Usuario\Resources;

use App\Filament\Usuario\Resources\PQRSFResource\Pages;
use App\Filament\Usuario\Resources\PQRSFResource\RelationManagers;
use App\Models\PQRSF;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PQRSFResource extends Resource
{
    protected static ?string $model = PQRSF::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';
    protected static ?string $navigationGroup = 'Contactos';  // Agrupación en el menú de navegación
    protected static ?string $label = 'PQRSF ';  // Etiqueta singular

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('caso')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('caso')
                ->label('Caso')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripción')
                ->sortable()
            
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
            'index' => Pages\ListPQRSFS::route('/'),
            'create' => Pages\CreatePQRSF::route('/create'),
            'edit' => Pages\EditPQRSF::route('/{record}/edit'),
        ];
    }
}
