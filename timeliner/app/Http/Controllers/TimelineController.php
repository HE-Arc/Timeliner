<?php

namespace App\Http\Controllers;

class TimelineController extends Controller
{
    public function timelinelist()
    {
        return view('timeline.timelinelist');
    }

    public function create()
    {
        return view('timeline.create');
    }
}
