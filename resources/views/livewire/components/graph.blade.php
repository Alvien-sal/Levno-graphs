
<div id='chart'></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        chart: {
            type: 'area'
            // height: 1000,
            // width: 200
        },
        series: @json($data),
        xaxis: {
            categories: @json($xaxis)
        },
        dataLabels:{
            enabled:false
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
    
</script>
