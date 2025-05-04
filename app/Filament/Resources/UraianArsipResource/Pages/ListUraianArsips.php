<?php

namespace App\Filament\Resources\UraianArsipResource\Pages;

use App\Filament\Resources\UraianArsipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUraianArsips extends ListRecords
{
    protected static string $resource = UraianArsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
