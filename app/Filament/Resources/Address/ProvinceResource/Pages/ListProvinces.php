<?php

namespace App\Filament\Resources\Address\ProvinceResource\Pages;

use App\Filament\Resources\Address\ProvinceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProvinces extends ListRecords
{
    protected static string $resource = ProvinceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
