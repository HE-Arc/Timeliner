<?php

namespace Database\Seeders;

use App\Models\Timeline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timeline::truncate();

        $timelines = [
            ['name' => "Timeline number one", 'private' => false, 'description' => "an important timeline"],
            ['name' => "Anne's timeline", 'private' => true, 'description' => "Only for Anne's friends"],
        ];

        foreach ($timelines as $timeline) {
            Timeline::create(array(
                'name' => $timeline['name'],
                'private' => $timeline['private'],
                'description' => $timeline['description']
            ));
        }
    }
}
