<?php

namespace App\Http\Controllers\Saller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SallerHomeController extends Controller
{
    public function index()
    {
        return view('saller.index');
    }
}
