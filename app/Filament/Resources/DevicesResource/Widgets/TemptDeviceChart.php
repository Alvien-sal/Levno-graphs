<?php

namespace App\Filament\Resources\DevicesResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\deviceReading;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TemptDeviceChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'temptDeviceChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'Volume Over Time';

    protected int|string|array $columnSpan = 'full';

    /**
     * The record passed from the View page
     */
    public ?Model $record = null;

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {
        // Query individual readings (no aggregation)
        $readings = deviceReading::query()
            ->where('device_id', $this->record?->device_id)
            ->whereBetween('created_at', [
                now()->subDays(30),
                now()
            ])
            ->orderBy('created_at', 'asc')
            ->get(['volume', 'created_at']);

        // Extract data for chart
        $volumes = $readings->pluck('volume')->toArray();
        $timestamps = $readings->map(function ($reading) {
            return Carbon::parse($reading->created_at)->format('Y-m-d H:i:s');
        })->toArray();

        return [
            'chart' => [
                'type' => 'area',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Volume',
                    'data' => $volumes,
                ],
            ],
            'xaxis' => [
                'show' => false,
                // 'categories' => $timestamps,
                // 'labels' => [
                //     'style' => [
                //         'fontFamily' => 'inherit',
                //     ],
                //     'rotate' => -45,
                // ],
            ],
            'yaxis' => [
                'show' => false,
                // 'labels' => [
                //     'style' => [
                //         'fontFamily' => 'inherit',
                //     ],
                // ],
            ],
            'colors' => ['#f59e0b'],
            'stroke' => [
                'curve' => 'smooth',
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
        ];
    }
}
