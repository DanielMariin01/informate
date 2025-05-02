<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TiempoRNMResource\Pages;
use App\Filament\Resources\TiempoRNMResource\RelationManagers;
use App\Models\Tiempo_RNM;
use App\Models\TiempoRNM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Laravel\Prompts\search;

class TiempoRNMResource extends Resource
{
    protected static ?string $model = Tiempo_RNM::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $label = 'Tiempo De RNM ';  // Etiqueta singular

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('fk_equipo')
                    ->relationship('equipo', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_sede')
                    ->relationship('sede', 'nombre')
                    ->required(),
                Forms\Components\TextInput::make('codigo_interno')
                    ->label('Código Interno')
                    ->nullable(),
                Forms\Components\TextInput::make('examen')
                    ->label('Examen')
                    ->nullable(),
                Forms\Components\TextInput::make('SM')
                    ->label('SM')
                    ->nullable(),
                Forms\Components\TextInput::make('GD')
                    ->label('GD')
                    ->nullable(),
                Forms\Components\TextInput::make('sedacion')
                    ->label('Sedación')
                    ->nullable(),
                    Forms\Components\Toggle::make('es_especial')
                    ->label('Es Especial')
                    ->onColor('success')
                    ->offColor('danger')
                    ->required(),
                Forms\Components\Textarea::make('observacion')
                    ->label('Observación')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('equipo.nombre')
                    ->label('Equipo')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('sede.nombre')
                    ->label('Sede')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_interno')
                    ->label('Código Interno')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('examen')
                    ->label('Examen')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('SM')
                    ->label('SM')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('GD')
                    ->label('GD')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('sedacion')
                    ->label('Sedación')
                    ->sortable()
                    ->searchable(),
                    Tables\Columns\BooleanColumn::make('es_especial')
                    ->label('Es Especial')
                    ->trueIcon('heroicon-o-check')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('observacion')
                    ->label('Observación')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Última Actualización')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //crear filtro por equipo
                Tables\Filters\SelectFilter::make('fk_equipo')
                    ->relationship('equipo', 'nombre')
                    ->label('Equipo'),
                //crear filtro por sede
                Tables\Filters\SelectFilter::make('fk_sede')
                    ->relationship('sede', 'nombre')
                    ->label('Sede')
                    ->searchable(),
           //filtro por examen
                Tables\Filters\SelectFilter::make('examen')
                    ->label('Examen')
                    ->options(Tiempo_RNM::pluck('examen', 'examen'))
                    ->multiple()
                    ->searchable(),
                //filtro por es_especial
                Tables\Filters\SelectFilter::make('es_especial')
                    ->label('Es Especial')
                    ->options([
                        '1' => 'Sí',
                        '0' => 'No',
                    ]),
             
            
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
            'index' => Pages\ListTiempoRNMS::route('/'),
            'create' => Pages\CreateTiempoRNM::route('/create'),
            'edit' => Pages\EditTiempoRNM::route('/{record}/edit'),
        ];
    }
}
