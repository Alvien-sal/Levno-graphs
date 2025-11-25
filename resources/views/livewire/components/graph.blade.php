<div 
    x-data="{ 
        config: {{ $config }},
        chartId: '{{ $chartId }}'
    }"
    x-init="

      console.log(config);

        new ApexCharts(
            document.getElementById(chartId),
            config
        ).render();
    "
>
    <div id="{{ $chartId }}" class="h-56"></div>
</div>

