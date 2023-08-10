<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'short_description',
        'number',
        'fb_link',
        'ins_link',
        'tw_link',
        'li_link',
        'image',

    ];
}
