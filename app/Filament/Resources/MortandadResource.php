<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MortandadResource\Pages;
use App\Models\Mortandades;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class MortandadResource extends Resource
{
    protected static ?string $model = Mortandades::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('galpon_id')
                    ->relationship('galpon', 'nombre')
                    ->required(),
                DatePicker::make('fecha')->required(),
                TextInput::make('cantidad')->numeric()->required(),
                Textarea::make('causa')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('galpon.nombre')->label('Galpón'),
                TextColumn::make('fecha')->date(),
                TextColumn::make('cantidad'),
                TextColumn::make('causa')->limit(30),
            ])
            ->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMortandads::route('/'),
            'create' => Pages\CreateMortandad::route('/create'),
            'edit' => Pages\EditMortandad::route('/{record}/edit'),
        ];
    }
}
