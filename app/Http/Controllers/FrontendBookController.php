<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendBookController extends Controller
{
    public function index()
    {
        $books = Book::select(['id', 'name', 'technology', 'simister', 'thumbnail', 'slug'])->orderBy('id', 'DESC')->paginate(16);
        return view('books.index', compact('books'));
    }

    public function details($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return $book;
    }

    public function favorite(Request $request)
    {
        $like = Like::where([['user_id', auth()->user()->id], ['book_id', $request->bookId]])->first();
        if ($like) {
            $like->delete();
        }else{
            Like::insert([
                'user_id' => auth()->user()->id,
                'book_id' => $request->bookId,
                'created_at' => Carbon::now()
            ]);
        }
        return response()->json('likeDone');
    }
}
