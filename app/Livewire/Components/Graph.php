<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Graph extends Component
{

    public $title;
    public $data;
    public $labels;


    public function render()
    {

        return("livewire.components.graph");
        
    }

    public function mount($title, $data, $labels){

        $this->title = $title;
        $this->data = $data['data'];
        $this->labels = $labels;

    }


}
