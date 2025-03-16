<?php

namespace App\Filament\Resources\Address\RegencieResource\Pages;

use App\Filament\Resources\Address\RegencieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegencie extends EditRecord
{
    protected static string $resource = RegencieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
