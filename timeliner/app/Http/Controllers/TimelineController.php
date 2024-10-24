<?php

namespace App\Http\Controllers;

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
}
