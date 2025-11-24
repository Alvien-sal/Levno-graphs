<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Graph extends Component
{

    public $title;
    public $data;
    public $labels;
    public $chartId;


    public function render()
    {

        // var_dump($this->chartId);

        return("livewire.components.graph");
        
    }

    public function mount($title, $data, $labels, $chartId){

        $this->title = $title;
        $this->data = $data['data'];
        $this->labels = $labels;
        $this->chartId = $chartId;

    }


}
