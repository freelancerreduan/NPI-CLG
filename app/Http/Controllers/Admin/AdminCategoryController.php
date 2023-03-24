<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()
        ->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required | string | max:255 | min:2 | unique:categories',
            'position' => 'required | string | max:10',
            'image' => 'required | image | mimes:jpg,png,jpeg'
        ], [
            'name.required' => 'The category name field is required.'
        ]);


        $path = 'uploads/categories/';
        $imgName = time().Str::random(5).'.'.$request->file('image')->getClientOriginalExtension();
        Image::make($request->file('image'))->resize(500, 334)->save(base_path($path.$imgName));


        Category::insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'position' => $request->position,
            'image' => $path.$imgName,
            'created_at' => Carbon::now()
        ]);
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
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
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
            'name' => 'required | string | max:255 | min:2',
            'position' => 'required | string | max:10',
            'image' => 'image | mimes:jpg,png,jpeg'
        ], [
            'name.required' => 'The category name field is required.'
        ]);


        $category = Category::where('id', $id)->first();

        if ($request->hasFile('image')) {
            unlink(base_path($category->image));
            $path = 'uploads/categories/';
            $imgName = time().Str::random(5).'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(500, 334)->save(base_path($path.$imgName));

            $category->update([
                'image' => $path.$imgName,
            ]);
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'position' => $request->position
        ]);
        return redirect()->route('category.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Deleted Successfully');
    }
}
