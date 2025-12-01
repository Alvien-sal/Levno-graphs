<?php

namespace App\Filament\Resources\devices\Pages;

use App\Filament\Resources\devices\deviceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class Viewdevice extends ViewRecord
{
    protected static string $resource = deviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
