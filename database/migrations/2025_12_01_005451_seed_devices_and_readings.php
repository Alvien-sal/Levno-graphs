<?php

use App\Models\User;
use App\Models\device;
use App\Models\deviceReading;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $users = User::all();
        
        if ($users->isEmpty()) {
            // Create some users if none exist
            User::factory()->count(5)->create();
            $users = User::all();
        }
        
        $deviceTypes = ['Milk Vat', 'Cooling Tank', 'Storage Tank', 'Processing Unit'];
        $deviceLocations = ['Barn A', 'Barn B', 'Main Facility', 'North Wing', 'South Wing'];
        
        foreach ($users as $user) {
            // Each user gets 1-4 devices
            $deviceCount = rand(1, 4);
            
            for ($d = 0; $d < $deviceCount; $d++) {
                // Create a device
                $deviceId = 'DEV-' . strtoupper(Str::random(8));
                $deviceType = $deviceTypes[array_rand($deviceTypes)];
                $location = $deviceLocations[array_rand($deviceLocations)];
                
                DB::table('devices')->insert([
                    'device_id' => $deviceId,
                    'name' => $deviceType . ' - ' . $location,
                    'user_id' => $user->id,
                ]);
                
                // Create device readings for the past 7 days
                // Readings every 15 minutes = 96 readings per day = 672 readings per week
                $startTime = Carbon::now()->subDays(7);
                $endTime = Carbon::now();
                
                $readings = [];
                $currentTime = $startTime->copy();
                
                // Initial values
                $volume = rand(100, 500); // Starting volume in liters
                $inletTemp = 16.0 + (rand(-10, 10) / 10); // Around 15-17°C
                $vatTemp = 4.0 + (rand(-5, 5) / 10); // Around 3.5-4.5°C (cooled)
                $stirrerValue = rand(0, 50); // Stirrer intensity 0-100
                
                while ($currentTime <= $endTime) {
                    // Simulate realistic data changes
                    
                    // Volume gradually increases during milking times (6am, 6pm)
                    $hour = $currentTime->hour;
                    if ($hour >= 5 && $hour <= 8) {
                        $volume += rand(5, 20); // Morning milking
                    } elseif ($hour >= 17 && $hour <= 20) {
                        $volume += rand(5, 20); // Evening milking
                    } elseif ($hour >= 10 && $hour <= 12 && rand(0, 10) > 7) {
                        $volume = max(100, $volume - rand(50, 200)); // Occasional collection
                    }
                    
                    // Keep volume in reasonable range
                    $volume = min(2000, max(50, $volume));
                    
                    // Temperature fluctuates slightly
                    $inletTemp += (rand(-5, 5) / 10);
                    $inletTemp = min(25.0, max(10.0, $inletTemp)); // Keep between 10-25°C
                    
                    $vatTemp += (rand(-3, 3) / 10);
                    $vatTemp = min(8.0, max(2.0, $vatTemp)); // Keep between 2-8°C
                    
                    // Stirrer varies
                    $stirrerValue += rand(-10, 10);
                    $stirrerValue = min(100, max(0, $stirrerValue));
                    
                    $readings[] = [
                        'volume' => round($volume, 1),
                        'inletTemp' => round($inletTemp, 1),
                        'vatTemp' => round($vatTemp, 1),
                        'stirrerValue' => round($stirrerValue, 1),
                        'device_id' => $deviceId,
                        'created_at' => $currentTime->format('Y-m-d H:i:s'),
                        'updated_at' => $currentTime->format('Y-m-d H:i:s'),
                    ];
                    
                    // Move to next reading (every 15 minutes)
                    $currentTime->addMinutes(15);
                }
                
                // Insert readings in chunks to avoid memory issues
                $chunks = array_chunk($readings, 100);
                foreach ($chunks as $chunk) {
                    DB::table('deviceReadings')->insert($chunk);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Delete all device readings
        DB::table('deviceReadings')->truncate();
        
        // Delete all devices
        DB::table('devices')->truncate();
    }
};
