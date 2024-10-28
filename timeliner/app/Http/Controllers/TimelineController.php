<?php

namespace App\Http\Controllers;

use App\Models\Timeline;

class TimelineController extends Controller
{
    public function fetchAllAvailable()
    {
        $timelines = Timeline::all();
        return view('index', ['timelines'=>$timelines]);
    }
}
