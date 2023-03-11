<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Runtime;

class userHomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
}
