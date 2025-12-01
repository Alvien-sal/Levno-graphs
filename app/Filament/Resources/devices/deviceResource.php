<?php

namespace App\Filament\Resources\devices;

use App\Filament\Resources\devices\Pages\Createdevice;
use App\Filament\Resources\devices\Pages\Editdevice;
use App\Filament\Resources\devices\Pages\Listdevices;
use App\Filament\Resources\devices\Pages\Viewdevice;
use App\Filament\Resources\devices\Schemas\deviceForm;
use App\Filament\Resources\devices\Schemas\deviceInfolist;
use App\Filament\Resources\devices\Tables\devicesTable;
use App\Models\device;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class deviceResource extends Resource
{
    protected static ?string $model = device::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'device_id';

    public static function form(Schema $schema): Schema
    {
        return deviceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return deviceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return devicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Listdevices::route('/'),
            'create' => Createdevice::route('/create'),
            'view' => Viewdevice::route('/{record}'),
            'edit' => Editdevice::route('/{record}/edit'),
        ];
    }
}
