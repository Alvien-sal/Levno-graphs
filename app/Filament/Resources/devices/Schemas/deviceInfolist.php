<?php

namespace App\Filament\Resources\devices\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class deviceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('device_id'),
                TextEntry::make('name'),
                TextEntry::make('user_id')
                    ->numeric(),
            ]);
    }
}
