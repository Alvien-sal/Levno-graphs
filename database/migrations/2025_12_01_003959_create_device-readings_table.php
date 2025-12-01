<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deviceReadings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('volume');
            $table->float('inletTemp');
            $table->float('vatTemp');
            $table->float('stirrerValue');
            $table->string('device_id');
            $table->foreign('device_id')->references('device_id')->on('devices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device-readings');
    }
};
