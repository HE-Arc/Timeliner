<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Timeline;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function create()
    {
        return view('timeline.partials.milestonecreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'description' => 'required|max:200'
        ]);

        $milestone = Milestone::create($request->all());
    }

    public function addToList()
    {
        
    }
}
