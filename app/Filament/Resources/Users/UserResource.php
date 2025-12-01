<?php

namespace App\Filament\Resources\Users;

use Illuminate\Database\Eloquent\Model;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists;

use Filament\Schemas\Components\Section;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DevicesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
            'view' => ViewUser::route('/{record}'),
        ];
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->icon(Heroicon::OutlinedUser)
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label('Full Name'),
                        Infolists\Components\TextEntry::make('email')
                            ->label('Email Address')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('email_verified_at')
                            ->label('Email Status')
                            ->dateTime()
                            ->badge()
                            ->color(fn ($state) => $state ? 'success' : 'warning'),
                    ])
                    ->columns(2),
                
                Section::make('Account Status')
                    ->icon(Heroicon::OutlinedShieldCheck)
                    ->collapsible()
                    ->schema([
                        Infolists\Components\TextEntry::make('two_factor_confirmed_at')
                            ->label('Two-Factor Authentication')
                            ->dateTime()
                            ->placeholder('Not enabled')
                            ->badge()
                            ->color(fn ($state) => $state ? 'success' : 'danger'),
                    ]),
                
                Section::make('Timestamps')
                    ->icon(Heroicon::OutlinedClock)
                    ->schema([
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Account Created')
                            ->dateTime(),
                        Infolists\Components\TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime(),
                    ])
                    ->columns(2),
                // Used as a reference for the devices relation manager
                // Section::make('Devices')
                //     ->icon(Heroicon::OutlinedDevicePhoneMobile)
                //     ->collapsible()
                //     ->schema([
                //         Infolists\Components\RepeatableEntry::make('devices')
                //             ->schema([
                //                 Infolists\Components\TextEntry::make('device_id')
                //                     ->label('Device ID'),
                //                 Infolists\Components\TextEntry::make('name')
                //                     ->label('Device Name'),
                //             ])
                //             ->columns(2),
                //     ]),
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Email' => $record->email,
            // Add more details as needed
        ];
    }
}
