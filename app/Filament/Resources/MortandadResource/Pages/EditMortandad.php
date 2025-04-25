<?php

namespace App\Filament\Resources\MortandadResource\Pages;

use App\Filament\Resources\MortandadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMortandad extends EditRecord
{
    protected static string $resource = MortandadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
