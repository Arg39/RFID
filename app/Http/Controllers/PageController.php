<?php

namespace App\Http\Controllers;

use App\Models\Scans;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $scans = Scans::all();
        return view ('dashboard',compact('scans'));
    }
}
