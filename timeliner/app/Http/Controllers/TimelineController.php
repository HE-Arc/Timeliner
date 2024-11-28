<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::all();
        return view('index', ['timelines' => $timelines]);
    }

    public function timelinelist()
    {
        return view('timeline.timelinelist');
    }

    public function create()
    {
        return view('timeline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'private' => 'required|boolean'
        ]);

        Timeline::create($request->all());

        return redirect()->route('timeline.index')
            ->with('success','Timeline created successfully.');
    }
}
