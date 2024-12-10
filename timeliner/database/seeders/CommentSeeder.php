<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Comment::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $comments = [
            ['user_id' => "1", 'timeline_id' => "2", 'comment' => "This is a comment"],
            ['user_id' => "1", 'timeline_id' => "1", 'comment' => "This is a second comment"],
            ['user_id' => "2", 'timeline_id' => "2", 'comment' => "This is a third comment"],
            ['user_id' => "2", 'timeline_id' => "1", 'comment' => "This is a fourth comment"],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
