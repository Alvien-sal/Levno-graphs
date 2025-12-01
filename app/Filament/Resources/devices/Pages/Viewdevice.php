<?php

namespace App\Filament\Resources\devices\Pages;

use App\Filament\Resources\devices\deviceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\DevicesResource\Widgets\TemptDeviceChart;

class Viewdevice extends ViewRecord
{
    protected static string $resource = deviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    public function getFooterWidgets(): array
    {
        return [
            TemptDeviceChart::class,
        ];
    }
}
