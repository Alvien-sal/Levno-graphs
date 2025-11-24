<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Charts\VatTemptChart;
use App\Services\DataReaderService;


class Dashboard extends Component
{

    private $dataReader;

    public function boot(DataReaderService $dataReader) {
        $this->dataReader = $dataReader;
    }


    public function render()
    {

        $dataVol = $this->dataReader->loadJson("vat_chart_sample_data.json", 'volume');

        $dataTemp = $this->dataReader->loadJson("vat_chart_sample_data.json", 'inletTemp');

        $dataStir = $this->dataReader->loadJson("vat_chart_sample_data.json", 'stirrerValue');
        
        
        return view('livewire.pages.dashboard', ["dataVol"=> $dataVol, "dataTemp" => $dataTemp, "dataStir" => $dataStir]);
    }
}
