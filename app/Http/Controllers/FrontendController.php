<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Counter;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $counters = Counter::get();
        return view('welcome', compact('counters'));
    }
}
