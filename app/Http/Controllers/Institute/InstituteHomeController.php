<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InstituteHomeController extends Controller
{
    public function index() {
        $userCount = User::where('ins_id', auth()->user()->id)->count();
        return view('institute.index', compact('userCount'));
    }

    public function userList(){
        $users = User::where('ins_id', auth()->user()->id)->get();
        return view('institute.user-list', compact('users'));
    }

    public function userCreate () {
        return view('institute.user-create');
    }

    public function userStore(Request $request) {
        $request->validate([
            'name' => 'required | string | max:255',
            'email' => 'required | email | max:255',
            'phone' => 'required | string | max:255',
        ]);
        $password = Str::random(8);
        $name = $request->name;

        User::insert([
            'name' => $name,
            'email' => $request->email,
            'ins_id' => auth()->user()->id,
            'phone' => $request->phone,
            'password' => Hash::make($password),
        ]);

        Mail::to($request->email)->send(new UserMail($name, $password));

        return back()->with('success', 'Created Successfully');
    }
}
