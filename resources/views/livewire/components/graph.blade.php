
{{-- <h1 class="">
    {{ $title }}
</h1> --}}

<div class="h-72">


    <div id="{{ $chartId }}"></div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

   var options = {
          series: [{
            name: @json($data['name']),
            data: @json($data['data'])
        }],
          chart: {
          type: @json($type),
          height: '100%',
          width: '100%',
          },
        dataLabels: {
          enabled: false
        },
       
        xaxis: {
          categories: @json($labels),
          labels: {
            show: false
          }
        },
        title:{
            text: @json($title),
            align: 'left'
        }
        };

        // console.log(json($data));

        var chart = new ApexCharts(document.querySelector("#"+@json($chartId)), options);
        chart.render();
    
</script>
