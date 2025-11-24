<div class="flex h-full w-full flex-1 flex-col">
    
    <h1 class="text-2xl font-bold">Dashboard</h1>


    <div class="">

        <div class="">

            <livewire:components.graph :data="$dataVol['seriesData']" :labels="$dataVol['xaxis']" title="Volume Over Time" chartId="chart1" />

        </div>

        <div>
            <livewire:components.graph :data="$dataTemp['seriesData']" :labels="$dataTemp['xaxis']" title="Temp Over Time" chartId="chart2"/>

        </div>
        
    </div>

    
   
        
    {{-- </flux:card> --}}
    

    
    
</div>