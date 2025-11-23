<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Charts\VatTemptChart;

class Dashboard extends Component
{

    // public $chart;


    public function render()
    {

       $chart = new VatTemptChart;

       $chart->labels(['One','Two','Three']);

       $chart->dataset('Dataset 1', 'line', [1,2,3,4]);

       $chart->dataset('Dataset 2', 'line', [4,3,2,1]);

    //    $this->chart = $chart;
        
        return view('livewire.pages.dashboard', ['chart' => 'chart']);
    }
}
