
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
            name: "InletTemp",
            data: @json($data)
        }],
          chart: {
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

        var chart = new ApexCharts(document.querySelector("#"+@json($chartId)), options);
        chart.render();
    
</script>
