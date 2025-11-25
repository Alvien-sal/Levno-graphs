<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class DataReaderService{

    public function __construct(){


    }

    public function loadJson($fileName, ...$columns){

        $tempData = File::json($fileName);

        $columnData = [];

        foreach ($columns as $column){
            $seriesData = [
                'name' => $column,
                'data' => array_column($tempData['data'][$column], 'value')
            ];

            $columnData[] = $seriesData;

        };

    
        $xaxis = array_map(function($item) {
            return date('d/m/Y H:i:s', $item['timestamp']);
        }, $tempData['data']['volume']);

        return [
            "seriesData" => $columnData,
            "xaxis" => $xaxis 
        ];
    }
}