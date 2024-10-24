<?php

namespace App\Http\Controllers;

class TimelineController extends Controller
{
    public function fetchAllAvailable()
    {
        return view('index', ['timelines'=>[["Timeline1:title",false,"somedescription"],["Timeline2",true,"some other description"]]]);
    }
}
