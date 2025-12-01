<?php

namespace App\Filament\Resources\devices\Pages;

use App\Filament\Resources\devices\deviceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class Editdevice extends EditRecord
{
    protected static string $resource = deviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
