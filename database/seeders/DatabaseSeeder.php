<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            "first_name"=> "Nantabo",
            "last_name"=> " Hildah",
            "email"=> "hildah@example.com",
            "password" => "password",
            "phone_number" => "0709952895",
            "NIN" => "CF456789",
        ]);
    }
}
