<?php

namespace Database\Seeders;

use App\Models\Milestone;
use App\Models\Node;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Milestone::truncate();

        $milestones = [
            ['description' => "Summer camp gathering", 'date' => Carbon::parse('2000-01-01'), 'node' => "1"],
            ['description' => "Bach play competition", 'date' => Carbon::parse('2002-08-01'), 'node' => "1"],
            ['description' => "Bach play competition", 'date' => Carbon::parse('2002-08-01'), 'node' => "2"],
            ['description' => "Lima concerto", 'date' => Carbon::parse('2002-10-01'), 'node' => "2"],
            ['description' => "Anne started practicing", 'date' => Carbon::parse('2013-07-07'), 'node' => "3"],
        ];

        foreach ($milestones as $milestone) {
            Milestone::create($milestone);
        }
    }
}
