<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalponResource\Pages;
use App\Models\Galpones;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalponResource extends Resource
{
    protected static ?string $model = Galpones::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('ubicacion')
                ->maxLength(65535),

            Forms\Components\TextInput::make('capacidad')
                ->required()
                ->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('ubicacion')->limit(30),
                Tables\Columns\TextColumn::make('capacidad'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalpons::route('/'),
            'create' => Pages\CreateGalpon::route('/create'),
            'edit' => Pages\EditGalpon::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }
}
