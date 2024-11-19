<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Import the User model

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate users table to start fresh
        DB::table('users')->truncate();

        // Call your PostUserSeeder or other seeders
        $this->call(PostUserSeeder::class);

        // Create a user if it doesn't exist
        User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => bcrypt('password'), // You may need to specify a password
        ]);
    }
}
