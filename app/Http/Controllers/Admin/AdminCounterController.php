<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::get();
        return view('admin.counter.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required | string | max:255',
            'count' => 'required | numeric | min:1'
        ]);

        Counter::insert([
            'heading' => $request->heading,
            'counter' => $request->count,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $counter = Counter::where('id', $id)->first();
        return view('admin.counter.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required | string | max:255',
            'count' => 'required | numeric | min:1'
        ]);

        $counter = Counter::where('id', $id)->first();

        $counter->update([
            'heading' => $request->heading,
            'counter' => $request->count,
        ]);

        return redirect()->route('counter.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counter = Counter::where('id', $id)->first();
        $counter->delete();
        return redirect()->route('counter.index')->with('success', 'Deleted Successfully');
    }
}
