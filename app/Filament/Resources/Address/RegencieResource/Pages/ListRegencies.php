<?php

namespace App\Filament\Resources\Address\RegencieResource\Pages;

use App\Filament\Resources\Address\RegencieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegencies extends ListRecords
{
    protected static string $resource = RegencieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
