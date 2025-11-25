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

        // dd($this->getChartConfig());

        return view('livewire.components.graph', [
        'config' => json_encode($this->getChartConfig())
    ]);
        
    }

    public function mount($title, $data, $labels, $chartId, $type){

        $this->title = $title;
        $this->data = $data;
        $this->labels = $labels;
        $this->chartId = $chartId;
        $this->type = $type;

    }

    public function getChartConfig()
    {
        return [
            'series' => $this->data,
            'chart' => [
                'type'   => $this->type,
                // 'height' => '100%',
                // 'width'  => '100%',
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'xaxis' => [
                'categories' => $this->labels,
                'labels' => [
                    'show' => false,
                ],

                "max" => 100 
            ],

            'title' => [
                'text'  => $this->title,
                'align' => 'left',
            ],

            'tooltip' => [
                'shared' => true,
                'intersect' => false,
            ],
        ];
    }


}
