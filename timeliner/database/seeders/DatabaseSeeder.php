<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ownership;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('timelines')->truncate();
        DB::table('nodes')->truncate();
        DB::table('milestones')->truncate();
        DB::table('ownerships')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345'
        ]);

        User::factory()->create([
            'name' => 'Other User',
            'email' => 'test2@example.com',
            'password' => '12345'
        ]);

        Ownership::create([
            'id' => '22',
        ]);

        $this->call(TimelineSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(NodeSeeder::class);
        $this->call(MilestoneSeeder::class);
    }
}
