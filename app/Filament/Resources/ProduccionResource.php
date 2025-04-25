<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduccionResource\Pages;
use App\Models\Produccion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProduccionResource extends Resource
{
    protected static ?string $model = Produccion::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?int $navigationSort = 3;

    public static function getPluralLabel(): string
    {
        return 'Producciones';
    }

    public static function getLabel(): string
    {
        return 'Producción';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('galpon_id')
                    ->relationship('galpon', 'nombre')
                    ->required(),
                Forms\Components\DatePicker::make('fecha')->required(),
                Forms\Components\TextInput::make('cantidad')->numeric()->required(),
                Forms\Components\TextInput::make('tipo')->required(),
                Forms\Components\Textarea::make('observaciones')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('galpon.nombre')->label('Galpón'),
                Tables\Columns\TextColumn::make('fecha')->date(),
                Tables\Columns\TextColumn::make('tipo'),
                Tables\Columns\TextColumn::make('cantidad'),
                Tables\Columns\TextColumn::make('observaciones')->limit(20),
            ])
            ->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduccions::route('/'),
            'create' => Pages\CreateProduccion::route('/create'),
            'edit' => Pages\EditProduccion::route('/{record}/edit'),
        ];
    }
}
