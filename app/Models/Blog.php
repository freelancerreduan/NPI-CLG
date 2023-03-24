<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'user_id',
        'section',
        'title',
        'slug',
        'image',
        'description',
        'status',
    ];

    public function blogWithUserRelation()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    public function blogWithCategoryRelation()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
