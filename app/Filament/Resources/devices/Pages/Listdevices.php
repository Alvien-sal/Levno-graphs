<?php

namespace App\Filament\Resources\devices\Pages;

use App\Filament\Resources\devices\deviceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listdevices extends ListRecords
{
    protected static string $resource = deviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
