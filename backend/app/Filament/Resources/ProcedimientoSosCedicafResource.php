<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcedimientoSosCedicafResource\Pages;
use App\Filament\Resources\ProcedimientoSosCedicafResource\RelationManagers;
use App\Models\Procedimiento_sos_cedicaf;
use App\Models\ProcedimientoSosCedicaf;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcedimientoSosCedicafResource extends Resource
{
    protected static ?string $model = Procedimiento_sos_cedicaf::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Instructivo PGP';
    protected static ?string $navigationLabel = 'PAC Bienestar CEDICAF';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cups')
                    ->label('CUPS')
                    ->required(),
                Forms\Components\TextInput::make('descripcion')
                    ->label('Descripción')
                    ->required(),
                Forms\Components\TextInput::make('homologo_iss')
                    ->label('Homólogo ISS')
                    ->required(),
                Forms\Components\TextInput::make('tarifario_negociado')
                    ->label('Tarifario Negociado')
                    ->required(),
                Forms\Components\TextInput::make('descuento_incremento')
                    ->label('Descuento Incremento')
                    ->required(),
                Forms\Components\TextInput::make('valor_tarifa')
                    ->label('Valor Tarifa')

                    ->required(),
                Forms\Components\TextInput::make('incluye')
                    ->label('Incluye'),
                Forms\Components\TextInput::make('bienestar_ambulatorio')
                    ->label('Bienestar Ambulatorio'),
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cups')
                    ->label('CUPS')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('homologo_iss')
                    ->label('Homólogo ISS')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tarifario_negociado')
                    ->label('Tarifario Negociado')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descuento_incremento')
                    ->label('Descuento Incremento')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('valor_tarifa')
                    ->label('Valor Tarifa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('incluye')
                    ->label('Incluye'),
                Tables\Columns\TextColumn::make('bienestar_ambulatorio')
                    ->label('Bienestar Ambulatorio'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
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
            'index' => Pages\ListProcedimientoSosCedicafs::route('/'),
            'create' => Pages\CreateProcedimientoSosCedicaf::route('/create'),
            'edit' => Pages\EditProcedimientoSosCedicaf::route('/{record}/edit'),
        ];
    }
}
