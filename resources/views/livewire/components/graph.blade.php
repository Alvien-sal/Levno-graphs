<div class="h-72">
    <div id="{{ $chartId }}"></div>
</div>

<script type="module">
    renderApexChart(
        @json($chartId),
        {
            series: [{
                name: @json($data['name']),
                data: @json($data['data'])
            }],
            chart: {
                type: @json($type),
                height: "100%",
                width: "100%",
            },
            dataLabels: { enabled: false },
            xaxis: {
                categories: @json($labels),
                labels: { show: false }
            },
            title: {
                text: @json($title),
                align: 'left'
            }
        }
    );
</script>

