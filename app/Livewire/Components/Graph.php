<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Graph extends Component
{

    public $title;
    public $data;
    public $labels;
    public $chartId;
    public $type;


    public function render()
    {

        // var_dump($this->data);

        return("livewire.components.graph");
        
    }

    public function mount($title, $data, $labels, $chartId, $type){

        $this->title = $title;
        $this->data = $data;
        $this->labels = $labels;
        $this->chartId = $chartId;
        $this->type = $type;

    }


}
