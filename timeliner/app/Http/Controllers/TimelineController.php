<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use App\Models\Ownership;
use App\Models\Comment;
use App\Models\Node;
use App\Models\Milestone;
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

            $comments = Comment::where('timeline_id', '=', $timeline->id)
                ->with('user')
                ->get();

            $isOwner = false;
            if (Auth::check())
            {
                $isOwner = Ownership::find($timeline->id . Auth::user()->id);
            }

            return view('timeline.timeline', ['isOwner'=> $isOwner, 'timeline' => $timeline, 'nodes' => $nodes, 'comments' => $comments]);
        }

        return redirect()->route('timeline.index')
            ->withErrors(["You don't have access."]);
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

        $validated = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'private' => 'required|boolean',
            'nodes' => 'nullable|array',
            'nodes.*.name' => 'required|string|max:255',
            'nodes.*.milestones' => 'nullable|array',
            'nodes.*.milestones.*.date' => 'required|date',
            'nodes.*.milestones.*.description' => 'required|string|max:255',
        ]);

        $timeline = Timeline::create(['name' => $validated['name'], 'description' => $validated['description'], 'private'=> !$validated['private']]);
        Ownership::create(['id' => $timeline->id . Auth::user()->id]);

        if (!empty($validated['nodes'])) {
            foreach ($validated['nodes'] as $nodeData) {

                $node = Node::create([
                    'name'=>$nodeData['name'],
                    'color'=>'#FFFFFF', // default color white, TODO: color picker
                    'timeline'=>$timeline->id
                ]);

                if (!empty($nodeData['milestones'])) {
                    foreach ($nodeData['milestones'] as $milestoneData) {
                        Milestone::create([
                            'date' => $milestoneData['date'],
                            'description' => $milestoneData['description'] ?? null,
                            'node' => $node->id
                        ]);
                    }
                }
            }
        }

        return redirect()->route('timeline.index')
            ->with('success','Timeline created successfully.');
    }

    public function edit($id)
    {
        $timeline = Timeline::findOrFail($id);

        if(($timeline != null) && (Auth::check() && Ownership::find($timeline->id . Auth::user()->id)))
        {
            $nodes = Node::where('timeline','=',$timeline->id)
                ->with('milestones')
                ->get();

            return view('timeline.edit', ['timeline' => $timeline, 'nodes' => $nodes]);
        }

        return redirect()->route('timeline.show', $id)
            ->withErrors(["You don't have access."]);
    }

    public function update(Request $request, $id)
    {
        $timeline = Timeline::findOrFail($id);

        if (($timeline != null) && (!$timeline->private || (Auth::check() && Ownership::find($timeline->id . Auth::user()->id)))) {

            $request->merge([
                'private' => $request->has('private'),
            ]);

            $validated = $request->validate([
                'name' => 'required|max:50',
                'description' => 'required|max:200',
                'private' => 'required|boolean',
                'nodes' => 'nullable|array',
                'nodes.*.name' => 'required|string|max:255',
                'nodes.*.milestones' => 'nullable|array',
                'nodes.*.milestones.*.date' => 'required|date',
                'nodes.*.milestones.*.description' => 'required|string|max:255',
            ]);

            // Update timeline details
            $timeline->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'private' => !$validated['private']
            ]);

            // Handle nodes
            if (!empty($validated['nodes'])) {
                // Delete nodes removed from the form
                $existingNodeIds = collect($validated['nodes'])->pluck('id')->filter();
                Node::where('timeline', $timeline->id)
                    ->whereNotIn('id', $existingNodeIds)
                    ->delete();

                // Update existing nodes or create new ones
                foreach ($validated['nodes'] as $nodeData) {
                    if (isset($nodeData['id'])) {
                        // Update existing node
                        $node = Node::findOrFail($nodeData['id']);
                        $node->update([
                            'name' => $nodeData['name'],
                            'color' => '#FFFFFF', // Default color)
                        ]);
                    } else {
                        // Create new node
                        $node = Node::create([
                            'name' => $nodeData['name'],
                            'color' => '#FFFFFF', // Default color
                            'timeline' => $timeline->id,
                        ]);
                    }

                    // Handle milestones
                    if (!empty($nodeData['milestones'])) {
                        foreach ($nodeData['milestones'] as $milestoneData) {
                            if (isset($milestoneData['id'])) {
                                // Update existing milestone
                                $milestone = Milestone::findOrFail($milestoneData['id']);
                                $milestone->update([
                                    'date' => $milestoneData['date'],
                                    'description' => $milestoneData['description'] ?? null,
                                ]);
                            } else {
                                // Create new milestone
                                Milestone::create([
                                    'date' => $milestoneData['date'],
                                    'description' => $milestoneData['description'] ?? null,
                                    'node' => $node->id
                                ]);
                            }
                        }
                    }
                }
            }

            return redirect()->route('timeline.show', $id)
                ->with('success', 'Timeline updated successfully.');
        }

        return redirect()->route('timeline.index')
            ->withErrors(["You don't have access."]);
    }

    public function destroy($id)
    {
        $timeline = Timeline::findOrFail($id);

        if (($timeline != null) && (Auth::check() && Ownership::find($timeline->id . Auth::user()->id))) {
            $timeline->delete();
            return redirect()->route('timeline.index')
                ->with('success', 'Timeline deleted successfully.');
        }

        return redirect()->route('timeline.index')
            ->withErrors(["You don't have the necessary rights."]);
    }
}
