<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Services\DataReaderService;
use App\Facades\DataReaderFacade;

class BlogPostsChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'blogPostsChart';


    protected int|string|array $columnSpan = 'full';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'BlogPostsChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */



    protected function getOptions(): array 
    {

       $data = DataReaderFacade::loadJson("vat_chart_sample_data.json", 'inletTemp', 'vatTemp');


        return [
            'chart' => [
                'type' => 'area',
                'height' => 300,
            ],
            'series' => $data['seriesData'],
            'xaxis' => [
                'categories' => $data['xaxis'],
                'labels' => [
                    'show' => false
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
            'stroke' => [
                'curve' => 'smooth',
            ],
            'dataLabels' => [
                'enabled' => false,
            ],

            'colors' => ['#0bf588ff'],
        ];
    }


}
