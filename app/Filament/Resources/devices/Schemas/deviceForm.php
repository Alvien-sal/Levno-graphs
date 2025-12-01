<?php

namespace App\Filament\Resources\devices\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class deviceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('device_id')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
