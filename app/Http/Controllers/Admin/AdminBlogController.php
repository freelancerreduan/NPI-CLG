<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs  = Blog::orderBy('id', 'DESC')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.blogs.create', compact('categories'));
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
            'title' => 'required | string | unique:blogs',
            'category_id' => 'required',
            'section' => 'required',
            'status' => 'required',
            'image' => 'required | image | mimes:jpg,png,jpeg',
            'description' => 'required | string',
        ], [
            'category_id.required' => 'The category field is required.'
        ]);

        $path = 'uploads/blogs/';
        $imgName = time().Str::random(5).'.'.$request->file('image')->getClientOriginalExtension();
        Image::make($request->file('image'))->resize(500, 334)->save(base_path($path.$imgName));

        $insert = Blog::insert([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'section' => $request->section,
            'status' => $request->status,
            'image' => $path.$imgName,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if ($insert) {
            Category::where('id', $request->category_id)->increment('p_count', 1);
        }
        return back()->with('success', 'Created Successfully');
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
        $blog = Blog::where('id', $id)->first();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.blogs.edit', compact('blog', 'categories'));
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
            'title' => 'required | string | max:255',
            'category_id' => 'required',
            'section' => 'required',
            'status' => 'required',
            'image' => 'image | mimes:jpg,png,jpeg',
            'description' => 'required | string',
        ], [
            'category_id.required' => 'The category field is required.'
        ]);
        $blog = Blog::where('id', $id)->first();
        Category::where('id', $blog->category_id)->decrement('p_count', 1);

        if ($request->hasFile('image')) {
            unlink(base_path($blog->image));

            $path = 'uploads/blogs/';
            $imgName = time().Str::random(5).'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(500, 334)->save(base_path($path.$imgName));

            $blog->update([
                'image' => $path.$imgName
            ]);
        }
        $updated = $blog->update([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'section' => $request->section,
            'status' => $request->status,
            'description' => $request->description,
        ]);
        Category::where('id', $request->category_id)->increment('p_count', 1);
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
        $blog = Blog::where('id', $id)->first();
        unlink(base_path($blog->image));
        $blog->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
