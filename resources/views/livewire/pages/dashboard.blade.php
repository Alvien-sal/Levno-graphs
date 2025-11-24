<div class="flex h-full w-full flex-1 flex-col">
    
    <h1 class="text-2xl font-bold">Dashboard</h1>


    <div class="grid grid-cols-3 grid-rows-4 h-full w-full">

        <div class="card bg-base-100 h-full w-full shadow-sm col-span-3 row-span-2">

            {{-- <livewire:components.graph :data="$dataVol['seriesData']" :labels="$dataVol['xaxis']" title="Volume Over Time" /> --}}

            <livewire:components.graph :data="$dataTemp['seriesData']" :labels="$dataTemp['xaxis']" title="Temp Over Time"/>

        </div>
        
    </div>

    
   
        
    {{-- </flux:card> --}}
    

    
    
</div>