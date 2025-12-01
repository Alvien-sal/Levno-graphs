<?php

use App\Models\User;
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
        // Create 20 users using the User factory
        User::factory()->count(20)->create();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally, you can delete the created users
        // This will delete the last 20 users created (be careful with this)
        // User::latest()->take(20)->delete();
    }
};
