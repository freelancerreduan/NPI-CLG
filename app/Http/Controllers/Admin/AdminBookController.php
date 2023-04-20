<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
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
            'title' => 'required | string | max:255 | unique:books',
            'name' => 'required | string | max:255',
            'technology' => 'required | string | max:255',
            'simister' => 'required | string',
            'regulations' => 'required | string | max:255',
            'status' => 'required | string | max:255',
            'published_by' => 'required | string | max:255',
            'price' => 'required | numeric',
            'thumbnail' => 'required | image | mimes:jpg,png,jpeg',
            'pages' => 'required',
            'pages.*' => 'image | mimes:jpg,png,jpeg',
        ]);

        $path = 'uploads/thumbnail/';
        $imgName = time().Str::random(5).'.'.$request->file('thumbnail')->getClientOriginalExtension();
        Image::make($request->file('thumbnail'))->resize(310, 450)->save(base_path($path.$imgName));

        $bookId = Book::insertGetId([
            'name' => $request->name,
            'technology' => $request->technology,
            'simister' => $request->simister,
            'title' => $request->title,
            'slug' => Str::slug($request->title).'-'.Str::random(5),
            'regulations' => $request->regulations,
            'published_by' => $request->published_by,
            'price' => $request->price,
            'thumbnail' => $path.$imgName,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);

        $pages = $request->pages;
        foreach ($pages as $key => $page) {
            $path = 'uploads/pages/';
            $imgName = time().Str::random(5).'.'.$page->getClientOriginalExtension();
            Image::make($page)->resize(310, 450)->save(base_path($path.$imgName));

            Page::insert([
                'book_id' => $bookId,
                'pages' => $path.$imgName,
                'created_at' => Carbon::now()
            ]);
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
        $book = Book::where('id', $id)->first();
        return view('admin.book.edit', compact('book'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::where('id', $id)->first();
        $pages = Page::where('book_id', $book->id)->get();
        foreach ($pages as $key => $page) {
            unlink(base_path($page->pages));
            $page->delete();
        }
        unlink(base_path($book->thumbnail));
        $book->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
