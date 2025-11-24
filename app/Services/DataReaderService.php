<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class DataReaderService{

    public function __construct(){


    }

    public function loadJson($fileName, $column){

        $tempData = File::json($fileName);

        $seriesData = [
            'name' => 'data',
            'data' => array_column($tempData['data'][$column], 'value')
        ];

        $xaxis = array_map(function($item) {
            return date('d/m/Y H:i:s', $item['timestamp']);
        }, $tempData['data']['volume']);

        return [
            "seriesData" => $seriesData,
            "xaxis" => $xaxis 
        ];
    }
}