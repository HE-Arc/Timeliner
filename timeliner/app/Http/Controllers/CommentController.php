<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:1000',
            'user_id' => 'required',
            'timeline_id' => 'required',
        ]);

        $comment = Comment::create($request->all());
        
        return redirect()->route('timeline.show', $request->timeline_id)
            ->with('success', 'Comment added successfully.');
    }
}
