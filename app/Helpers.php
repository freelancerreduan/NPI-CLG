<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\PaymentMethod;

if (!function_exists('categories')) {
    function categories($position, $limit)
    {
        $categories = Category::where('position', $position)->limit($limit)->latest()->get();
        if( $categories ){
            return $categories;
        }else{
        return false;
        }
    }
}


if (!function_exists('blogs')) {
    function blogs($section, $limit)
    {
        $blogs = Blog::with('blogWithUserRelation', 'blogWithCategoryRelation')->where('section', $section)->limit($limit)->orderBy('id', 'DESC')->get();
        if( $blogs ){
            return $blogs;
        }else{
        return false;
        }
    }
}


if (!function_exists('pages')) {
    function pages($bookId)
    {
        $pages = Page::where('book_id', $bookId)->get();
        if( $pages ){
            return $pages;
        }else{
        return false;
        }
    }
}

if (!function_exists('paymentMethods')) {
    function paymentMethods()
    {
        $paymentMethods = PaymentMethod::all();
        if( $paymentMethods ){
            return $paymentMethods;
        }else{
        return false;
        }
    }
}
