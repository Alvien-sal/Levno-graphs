<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Mail;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Send Email Verification')
                ->form([
                    TextInput::make('subject')
                        ->label('Subject')
                        ->required(),
                    TextInput::make('body')
                        ->label('Body')
                        ->required(),
                ])
                ->action(function (array $data) {
                    // Mail::to($this->record->email)
                    //     ->send(new GenericEmail(
                    //         subject: $data['subject'],
                    //         body: $data['body'],
                    //     ));
                }),
        ];
    }
}
