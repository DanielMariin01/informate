<?php

namespace App\Filament\Usuario\Resources;

use App\Filament\Usuario\Resources\ProcedimientoSOSCedicafResource\Pages;
use App\Filament\Usuario\Resources\ProcedimientoSOSCedicafResource\RelationManagers;
use App\Models\Procedimiento_sos_cedicaf;
use App\Models\ProcedimientoSOSCedicaf;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcedimientoSOSCedicafResource extends Resource
{
    protected static ?string $model = Procedimiento_sos_cedicaf::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
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
            'index' => Pages\ListProcedimientoSOSCedicafs::route('/'),
            'create' => Pages\CreateProcedimientoSOSCedicaf::route('/create'),
            'edit' => Pages\EditProcedimientoSOSCedicaf::route('/{record}/edit'),
        ];
    }
}
