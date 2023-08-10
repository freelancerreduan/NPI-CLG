<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AdminTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers  = Teacher::orderBy('id', 'DESC')->limit(20)->get();
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
    }




// 



























    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255',
            'title' => 'required | string | max:255',
            'short_description' => 'required | string | max:255',
            'number' => 'required | string | max:255',
            'image' => 'required | image | mimes:jpg,png,jpeg'
        ]);
        $fb_link = $request->fb_link ? $request->fb_link : null;
        $ins_link = $request->ins_link ? $request->ins_link : null;
        $tw_link = $request->tw_link ? $request->tw_link : null;
        $li_link = $request->li_link ? $request->li_link : null;

        $path = 'uploads/teacher/';
        $imgName = time().Str::random(5).'.'.$request->file('image')->getClientOriginalExtension();
        Image::make($request->file('image'))->resize(612, 408)->save(base_path($path.$imgName));
        Teacher::insert([
            'name' => $request->name,
            'title' => $request->title,
            'number' => $request->number,
            'fb_link' => $fb_link,
            'ins_link' => $ins_link,
            'tw_link' => $tw_link,
            'li_link' => $li_link,
            'short_description' => $request->short_description,
            'image' => $path.$imgName,
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
        $teacher = Teacher::where('id', $id)->first();
        return view('admin.teacher.edit', compact('teacher'));
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
            'name' => 'required | string | max:255',
            'title' => 'required | string | max:255',
            'short_description' => 'required | string | max:255',
            'number' => 'required | string | max:255',
            'image.*' => 'image | mimes:jpg,png,jpeg'
        ]);
        $fb_link = $request->fb_link ? $request->fb_link : null;
        $ins_link = $request->ins_link ? $request->ins_link : null;
        $tw_link = $request->tw_link ? $request->tw_link : null;
        $li_link = $request->li_link ? $request->li_link : null;
        $teacher = Teacher::where('id', $id)->first();
        if ($request->hasFile('image')) {
            unlink(base_path($teacher->image));
            $path = 'uploads/teacher/';
            $imgName = time().Str::random(5).'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(612, 408)->save(base_path($path.$imgName));
            $teacher->update([
                'image' => $path.$imgName
            ]);
        }
        $teacher->update([
            'name' => $request->name,
            'title' => $request->title,
            'number' => $request->number,
            'fb_link' => $fb_link,
            'ins_link' => $ins_link,
            'tw_link' => $tw_link,
            'li_link' => $li_link,
            'short_description' => $request->short_description,
        ]);
        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::where('id', $id)->first();
        unlink(base_path($teacher->image));
        $teacher->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
