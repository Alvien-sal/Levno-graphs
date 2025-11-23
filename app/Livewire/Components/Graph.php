<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class Graph extends Component
{

    public $data;
    public $xaxis;

    public function render()
    {

        return view('livewire.components.graph');
    }


    public function mount()
{
    $tempData = File::json('vat_chart_sample_data.json');

    $this->data = [];
    $this->xaxis = [];

    foreach ($tempData['data']['volume'] as $item) {
        $this->data[0]['data'][] = $item['value'];
        $this->xaxis[] = Carbon::createFromTimestamp($item['timestamp'])->format('d/m/Y H:i:s');;
    }

    $this->data[0]['name'] = 'data';
}

}
