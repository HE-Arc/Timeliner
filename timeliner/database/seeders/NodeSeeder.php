<?php

namespace Database\Seeders;

use App\Models\Timeline;
use App\Models\Node;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Node::truncate();

        $nodes = [
            ['name' => "Jules' concerts", 'color' => '#ffc0cb', 'timeline' => "1"],
            ['name' => "Anne's concerts", 'color' => '#bdb76b', 'timeline' => "1"],
            ['name' => "Violin", 'color' => '#40e0d0', 'timeline' => "2"],
            ['name' => "Piano", 'color' => '#49796b', 'timeline' => "2"],
        ];

        foreach ($nodes as $node) {
            Node::create(array(
                'name' => $node['name'],
                'color' => $node['color'],
                'timeline' => $node['timeline']
            ));
        }
    }
}
