<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Livewire\Attributes\Computed;
use App\Models\User;
use App\Models\device;

class SearchWidget extends Widget
{
    protected string $view = 'filament.widgets.search-widget';

    protected int | string | array $columnSpan = 'full';

    public string $search = '';

    #[Computed]
    public function results(): array
    {
        if (strlen($this->search) < 2) {
            return [];
        }

        $results = [];

        // Search users
        $users = User::search($this->search)->take(5)->get();
        foreach ($users as $user) {
            $results[] = [
                'type' => 'user',
                'id' => $user->id,
                'title' => $user->name,
                'subtitle' => $user->email,
                'initials' => $user->initials(),
                'url' => route('filament.admin.resources.users.view', $user),
            ];
        }

        // Search devices
        $devices = device::search($this->search)->take(5)->get();
        foreach ($devices as $device) {
            $results[] = [
                'type' => 'device',
                'id' => $device->device_id,
                'title' => $device->name,
                'subtitle' => 'ID: ' . $device->device_id,
                'url' => route('filament.admin.resources.devices.view', $device),
            ];
        }

        return $results;
    }

    public function clearSearch(): void
    {
        $this->search = '';
    }
}

