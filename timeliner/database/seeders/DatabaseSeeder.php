<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Timeline;
use Illuminate\Support\Facades\DB;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345'
        ]);


        DB::table('timelines')->insert([
            'name' => "Timeline number one",
            'private' => false,
            'description' => "an important timeline",
        ]);
        DB::table('timelines')->insert([
            'name' => "Anne's timeline",
            'private' => true,
            'description' => "Only for Anne's friends",
        ]);
    }
}
