<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.index');
        }

        elseif(auth()->user()->role == 'user') {
            return redirect()->route('user.index');
        }
        else{
            return 'hi sallar';
        }
    }
}
