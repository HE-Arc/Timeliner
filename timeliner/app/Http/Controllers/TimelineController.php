<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function fetchAllAvailable()
    {
        return view('index', ['timelines'=>[["Timeline1:title",false,"somedescription"],["Timeline2",true,"some other description"]]]);
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
        \App\Models\Timeline::create($request->all());
        // TODO solve mass assignement problem
        return redirect()->route('timeline.timelinelist')->with('success','Timeline created successfully.');
    }
}
