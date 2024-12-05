<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use App\Models\Ownership;
use App\Models\Comment;
use App\Models\Node;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

use function Psy\debug;

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

    public function show($id)
    {
        $timeline = Timeline::findOrFail($id);

        if(($timeline != null) && (!$timeline->private || (Auth::check() && Ownership::find($timeline->id . Auth::user()->id))))
        {
            $nodes = Node::where('timeline','=',$timeline->id)
                ->with('milestones')
                ->get();

            Log::info('nodes: '.$nodes->count());
            $comments = Comment::where('timeline', '=', $timeline->id);

            $isOwner = false;
            if (Auth::check())
            {
                $isOwner = Ownership::find($timeline->id . Auth::user()->id);
            }

            return view('timeline.timeline', ['isOwner'=> $isOwner, 'timeline' => $timeline, 'nodes' => $nodes]);
        }

        return redirect()->route('timeline.index')
            ->with('success',"You don't have access.");
    }

    public function create()
    {
        return view('timeline.create');
    }

    public function store(Request $request)
    {
        
        $request->merge([
            'private' => $request->has('private'),
        ]);

        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'private' => 'required|boolean'
        ]);

        $timeline = Timeline::create($request->all());
        Ownership::create(['id' => $timeline->id . Auth::user()->id]);

        return redirect()->route('timeline.index')
            ->with('success','Timeline created successfully.');
    }
}
