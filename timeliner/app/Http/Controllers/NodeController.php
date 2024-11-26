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

class NodeController extends Controller
{
    public function create()
    {
        return view('timeline.parsials.nodecreate');
    }

    public function store(Request $request)
    {
       // Store node
    }
}
