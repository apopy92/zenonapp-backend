<?php

namespace App\Filament\Resources\MortandadResource\Pages;

use App\Filament\Resources\MortandadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMortandads extends ListRecords
{
    protected static string $resource = MortandadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
