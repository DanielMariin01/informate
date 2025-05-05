<?php

namespace App\Filament\Usuario\Resources;

use App\Filament\Usuario\Resources\ProcedimientoSosRadiologosResource\Pages;
use App\Filament\Usuario\Resources\ProcedimientoSosRadiologosResource\RelationManagers;
use App\Models\Procedimiento_sos_radiologos;
use App\Models\ProcedimientoSosRadiologos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcedimientoSosRadiologosResource extends Resource
{
    protected static ?string $model = Procedimiento_sos_radiologos::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Instructivo PGP';
    protected static ?string $navigationLabel = 'PAC Bienestar Radiologos';
    protected static ?string $label = 'Procedimiento SOS Radiologos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cups')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('descripcion')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('valor_vigente')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('incluye')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('consideracion')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('Observaciones')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('bienestar_ambulatorio')
                        ->required()
                        ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cups')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('descripcion')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('valor_vigente')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('incluye')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('consideracion')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('Observaciones')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('bienestar_ambulatorio')
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
            'index' => Pages\ListProcedimientoSosRadiologos::route('/'),
            'create' => Pages\CreateProcedimientoSosRadiologos::route('/create'),
            'edit' => Pages\EditProcedimientoSosRadiologos::route('/{record}/edit'),
        ];
    }
}
