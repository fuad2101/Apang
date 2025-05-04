<?php

namespace App\Filament\Resources\UraianArsipResource\Pages;

use App\Filament\Resources\UraianArsipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUraianArsip extends EditRecord
{
    protected static string $resource = UraianArsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
