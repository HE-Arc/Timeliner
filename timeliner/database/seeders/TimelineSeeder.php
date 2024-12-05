<?php

namespace Database\Seeders;

use App\Models\Timeline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Timeline::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $timelines = [
            ['name' => "Timeline number one", 'private' => false, 'description' => "an important timeline"],
            ['name' => "Anne's timeline", 'private' => true, 'description' => "Only for Anne's friends"],
        ];

        foreach ($timelines as $timeline) {
            Timeline::create($timeline);
        }
    }
}
