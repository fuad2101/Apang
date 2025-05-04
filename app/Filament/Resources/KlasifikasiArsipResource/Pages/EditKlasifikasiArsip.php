<?php

namespace App\Filament\Resources\KlasifikasiArsipResource\Pages;

use App\Filament\Resources\KlasifikasiArsipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKlasifikasiArsip extends EditRecord
{
    protected static string $resource = KlasifikasiArsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
