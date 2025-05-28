<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContratacionClienteResource\Pages;
use App\Filament\Resources\ContratacionClienteResource\RelationManagers;
use App\Models\Contratacion_cliente;
use App\Models\ContratacionCliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
class ContratacionClienteResource extends Resource
{
    protected static ?string $model = Contratacion_cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Matriz de contratacion';  // Agrupación en el menú de navegación
    protected static ?string $label = 'Contratación de Clientes';  // Etiqueta singular

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //realizar el form para seleccionar la empresa y la ciudad
                Forms\Components\TextInput::make('cliente_anterior')
                ->label('Cliente Anterior')
                ->required(),
            Forms\Components\TextInput::make('cliente_nuevo')
                ->label('Cliente Nuevo')
                ->required(),
            Forms\Components\Select::make('fk_empresa')
                ->relationship('empresa', 'nombre')
                ->label('Empresa')
                ->required(),
            Forms\Components\Select::make('fk_ciudad')
                ->relationship('ciudad', 'nombre')
                ->label('Ciudad')
                ->required(),
            Forms\Components\TextInput::make('director_contrato')
                ->label('Director de Contrato')
                ->required(),
            Forms\Components\TextInput::make('codigo_cliente')
                ->label('Código Cliente')
                ->required(),
            Forms\Components\Textarea::make('descripcion')
                ->label('Descripción')
                ->required(),
            Forms\Components\TextInput::make('contenido_contrato')
                ->label('Contenido del Contrato')
                ->required(),
            Forms\Components\TextInput::make('soporte_admision')
                ->label('Soporte de Admisión')
                ->required(),
            Forms\Components\TextInput::make('copagos_cuotas_moderadoras')
                ->label('Copagos y Cuotas Moderadoras')
                ->required(),
            Forms\Components\TextInput::make('exclusiones_contrato')
                ->label('Exclusiones del Contrato')
                ->required(),
            Forms\Components\TextInput::make('observaciones_autorizacion')
                ->label('Observaciones de Autorización')
                ->required(),
            Forms\Components\TextInput::make('sedacion_998702')
                ->label('Sedación 998702')
                ->required(),
            Forms\Components\TextInput::make('medio_contraste_hidrosoluble_fluoroscopia')
                ->label('Medio de Contraste Hidrosoluble Fluoroscopia')
                ->nullable(),
            Forms\Components\TextInput::make('contraste_farmacologico_caverjet')
                ->label('Contraste Farmacológico Caverjet')
                ->required(),
            Forms\Components\TextInput::make('contraste_hepatoespecifico_primovist')
                ->label('Contraste Hepatoespecífico Primovist')
                ->required(),
            Forms\Components\TextInput::make('incluye_eco_881431')
                ->label('Incluye Eco 881431')
                ->required(),
            Forms\Components\TextInput::make('incluye_eco_881401')
                ->label('Incluye Eco 881401')
                ->required(),
            Forms\Components\TextInput::make('consulta_cardiologia_primera_vez')
                ->label('Consulta Cardiología Primera Vez')
                ->required(),
            Forms\Components\TextInput::make('doppler_extremidades')
                ->label('Doppler de Extremidades')
                ->required(),
            Forms\Components\TextInput::make('particularidades')
                ->label('Particularidades')
                ->required(),
            Forms\Components\TextInput::make('validacion_autorizacion_linea')
                ->label('Validación de Autorización Línea')
                ->required(),
            Forms\Components\TextInput::make('validacion_autorizacion_pagina')
                ->label('Validación de Autorización Página')
                ->required(),
            Forms\Components\Textarea::make('servicios_contratados')
                ->label('Servicios Contratados')
                ->required(),
      
            

                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cliente_anterior')
                ->label('Cliente Anterior')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('cliente_nuevo')
                ->label('Cliente Nuevo')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('empresa.nombre')
                ->label('Empresa')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('ciudad.nombre')
                ->label('Ciudad')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('director_contrato')
                ->label('Director de Contrato')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('codigo_cliente')
                ->label('Código Cliente')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripción')
                ->limit(50)
                ->searchable(),
            Tables\Columns\TextColumn::make('contenido_contrato')
                ->label('Contenido del Contrato')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('soporte_admision')
                ->label('Soporte de Admisión')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('copagos_cuotas_moderadoras')
                ->label('Copagos y Cuotas Moderadoras')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('exclusiones_contrato')
                ->label('Exclusiones del Contrato')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('observaciones_autorizacion')
                ->label('Observaciones de Autorización')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('sedacion_998702')
                ->label('Sedación 998702')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('medio_contraste_hidrosoluble_fluoroscopia')
                ->label('Medio de Contraste Hidrosoluble Fluoroscopia')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('contraste_farmacologico_caverjet')
                ->label('Contraste Farmacológico Caverjet')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('contraste_hepatoespecifico_primovist')
                ->label('Contraste Hepatoespecífico Primovist')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('incluye_eco_881431')
                ->label('Incluye Eco 881431')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('incluye_eco_881401')
                ->label('Incluye Eco 881401')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('consulta_cardiologia_primera_vez')
                ->label('Consulta Cardiología Primera Vez')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('doppler_extremidades')
                ->label('Doppler de Extremidades')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('particularidades')
                ->label('Particularidades')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('validacion_autorizacion_linea')
                ->label('Validación de Autorización Línea')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('validacion_autorizacion_pagina')
                ->label('Validación de Autorización Página')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('servicios_contratados')
                ->label('Servicios Contratados')
                ->limit(50)
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Fecha de Creación')
                ->sortable()
                ->dateTime(),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Última Actualización')
                ->sortable()
                ->dateTime(),
            ])
            ->defaultPaginationPageOption(10)
            ->paginationPageOptions([10, 25, 50, 100])
            ->filters([
                //filtro por empresa
                Tables\Filters\SelectFilter::make('fk_empresa')
                    ->relationship('empresa', 'nombre')
                    ->label('Empresa'),
                //filtro por ciudad
                Tables\Filters\SelectFilter::make('fk_ciudad')
                    ->relationship('ciudad', 'nombre')
                    ->label('Ciudad'),
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
            'index' => Pages\ListContratacionClientes::route('/'),
            'create' => Pages\CreateContratacionCliente::route('/create'),
            'edit' => Pages\EditContratacionCliente::route('/{record}/edit'),
        ];
    }
}
