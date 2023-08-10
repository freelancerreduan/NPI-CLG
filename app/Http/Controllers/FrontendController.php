<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Counter;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function ingetInstitutedex(Request $request) {
        $type = $request->type;
        if ($type == 'user') {
            $institutes = User::where('role', 'institute')->orderBy('name', 'ASC')->get();
            return view('partials.institutes', compact('institutes'));
        }
    }
    public function index()
    {
        $counters = Counter::get();
        $teachers = Teacher::orderBy('id', 'DESC')->limit(20)->get();
        return view('welcome', compact('counters', 'teachers'));
    }
    public function blog() {
        $blogs = Blog::where('status', 'approved')->orderBy('id', 'DESC')->paginate(40);
        return view('blogs', compact('blogs'));
    }

    public function blogDetails($slug) {
        $blog = Blog::with('blogWithUserRelation')->where([['slug', $slug], ['status', 'approved']])->first();
        if ($blog) {
            $resentPosts = blog::orderBy('created_at', 'DESC')
            ->where('id', '!=', $blog->id)
            ->limit(10)->get();
            return view('blog-details', compact('blog', 'resentPosts'));
        }else{
            abort(404);
        }
    }
}
