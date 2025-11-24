<div class="flex h-full w-full flex-1 flex-col">
    
    <h1 class="text-2xl font-bold">Dashboard</h1>

    <div class="grid grid-cols-2 gap-4">

        <div class="col-span-2">
            <livewire:components.graph 
                :data="$dataTemp['seriesData']" 
                :labels="$dataTemp['xaxis']" 
                title="Temp Over Time" 
                chartId="chart1"
                type="area"
            />   

         </div>

        <div>

            <livewire:components.graph 
            :data="$dataVol['seriesData']" 
            :labels="$dataVol['xaxis']" 
            title="Volume Over Time" 
            chartId="chart2" 
            type="line"
        />

        
        </div>

         <div>

            <livewire:components.graph 
            :data="$dataStir['seriesData']" 
            :labels="$dataStir['xaxis']" 
            title="Stirrer Over Time" 
            chartId="chart3" 
            type="line"
        />

        
        </div>
            
    </div>



    
    
</div>