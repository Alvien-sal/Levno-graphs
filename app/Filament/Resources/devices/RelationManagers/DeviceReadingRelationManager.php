<?php

namespace App\Filament\Resources\devices\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeviceReadingRelationManager extends RelationManager
{
    protected static string $relationship = 'deviceReading';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('volume')
                    ->required()
                    ->maxLength(255),
                TextInput::make('timestamp')
                    ->required()
                    ->maxLength(255),
                TextInput::make('inletTemp')
                    ->required()
                    ->maxLength(255),
                TextInput::make('vatTemp')
                    ->required()
                    ->maxLength(255),
                TextInput::make('stirrerValue')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('volume')
            ->columns([
                TextColumn::make('volume')
                    ->searchable(),
                TextColumn::make('timestamp')
                    ->searchable(),
                TextColumn::make('inletTemp')
                    ->searchable(),
                TextColumn::make('vatTemp')
                    ->searchable(),
                TextColumn::make('stirrerValue')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
