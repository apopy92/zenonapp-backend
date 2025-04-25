<?php

namespace App\Filament\Resources\GalponResource\Pages;

use App\Filament\Resources\GalponResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGalpon extends EditRecord
{
    protected static string $resource = GalponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
