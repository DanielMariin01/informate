<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcedimientoResource\Pages;
use App\Filament\Resources\ProcedimientoResource\RelationManagers;
use App\Models\Procedimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcedimientoResource extends Resource
{
    protected static ?string $model = Procedimiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationGroup = 'Administración';  // Agrupación en el menú de navegación
    protected static ?string $label = 'Procedimiento';  // Etiqueta singular

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo_radiologos')
                ->label('Código Radiólogos')
                ->nullable(),
            Forms\Components\TextInput::make('codigo_cedicaf')
                ->label('Código Cedicaf')
                ->nullable(),
            Forms\Components\TextInput::make('codigo_diaxme')
                ->label('Código Diaxme')
                ->nullable(),
            Forms\Components\TextInput::make('codigo_resolucion')
                ->label('Código Resolución')
                ->nullable(),
            Forms\Components\TextInput::make('nombre')
                ->label('Nombre')
                ->required(),
         
            Forms\Components\Textarea::make('descripcion')
                ->label('Descripción')
                ->nullable(),
            Forms\Components\TextInput::make('redond_particular_2025')
                ->label('Redondeo Particular 2025')
                ->nullable(),
            Forms\Components\TextInput::make('redond_10_2025')
                ->label('Redondeo 10% 2025')
                ->nullable(),
            Forms\Components\TextInput::make('tipo_tarifa_10')
                ->label('Tipo Tarifa 10%')
                ->nullable(),
            Forms\Components\TextInput::make('redond_20_2025')
                ->label('Redondeo 20% 2025')
                ->nullable(),
            Forms\Components\TextInput::make('tipo_tarifa_20')
                ->label('Tipo Tarifa 20%')
                ->nullable(),
            Forms\Components\TextInput::make('redond_30_2025')
                ->label('Redondeo 30% 2025')
                ->nullable(),
            Forms\Components\TextInput::make('tipo_tarifa_30')
                ->label('Tipo Tarifa 30%')
                ->nullable(),
            Forms\Components\TextInput::make('redond_40_2025')
                ->label('Redondeo 40% 2025')
                ->nullable(),
            Forms\Components\TextInput::make('tipo_tarifa_40')
                ->label('Tipo Tarifa 40%')
                ->nullable(),
            Forms\Components\TextInput::make('redond_medi_mer_privado_2025')
                ->label('Redondeo Medi Mer Privado 2025')
                ->nullable(),
            Forms\Components\TextInput::make('tipo_tarifa_medi_mer')
                ->label('Tipo Tarifa Medi Mer')
                ->nullable(),
            Forms\Components\Textarea::make('inclusiones')
                ->label('Inclusiones')
                ->nullable(),
            Forms\Components\Textarea::make('observaciones')
                ->label('Observaciones')
                ->nullable(),
            Forms\Components\Select::make('fk_especialidad')
                ->label('Especialidad')
                ->relationship('especialidad', 'nombre')
                ->nullable(),
                Forms\Components\TextInput::make('link')
                ->label('Link')
                
                ->required(),
           
        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo_radiologos')
                    ->label('Código Radiólogos')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo_cedicaf')
                    ->label('Código Cedicaf')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo_diaxme')
                    ->label('Código Diaxme')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo_resolucion')
                    ->label('Código Resolución')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
        
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable()
                    ->sortable(),
          
                Tables\Columns\TextColumn::make('redond_particular_2025')
                    ->label('Redondeo Particular 2025')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('redond_10_2025')
                    ->label('Redondeo 10% 2025')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_tarifa_10')   
                    ->label('Tipo Tarifa 10%')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('redond_20_2025')
                    ->label('Redondeo 20% 2025')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_tarifa_20')       
                    ->label('Tipo Tarifa 20%')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('redond_30_2025')
                    ->label('Redondeo 30% 2025')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_tarifa_30')
                    ->label('Tipo Tarifa 30%')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('redond_40_2025')
                    ->label('Redondeo 40% 2025')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_tarifa_40')
                    ->label('Tipo Tarifa 40%')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('redond_medi_mer_privado_2025')
                    ->label('Redondeo Medi Mer Privado 2025')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_tarifa_medi_mer')
                    ->label('Tipo Tarifa Medi Mer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('inclusiones')
                    ->label('Inclusiones')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('observaciones')
                    ->label('Observaciones')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('especialidad.nombre')
                    ->label('Especialidad')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('Link')
                    ->searchable()
                    ->url(fn ($record) => $record->link)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at') // Columna para mostrar la fecha de creación
                    ->label('Fecha de Creación')
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')  // Columna para mostrar la fecha de última actualización
                    ->label('Última Actualización')
                    ->sortable()
                    ->dateTime(),
             
            ])
            ->defaultPaginationPageOption(20)
            ->paginationPageOptions([10, 50, 100, 200])
            ->filters([
                Tables\Filters\SelectFilter::make('fk_especialidad')
                ->label('Especialidad')
                ->relationship('especialidad', 'nombre')
                ->placeholder('Todas las especialidades'),
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
            'index' => Pages\ListProcedimientos::route('/'),
            'create' => Pages\CreateProcedimiento::route('/create'),
            'edit' => Pages\EditProcedimiento::route('/{record}/edit'),
        ];
    }
}
