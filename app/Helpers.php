<?php

use App\Models\Category;

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
