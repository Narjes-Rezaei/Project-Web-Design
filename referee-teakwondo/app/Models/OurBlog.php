<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurBlog extends Model
{
    //
    protected $fillable = [
        'image',
        'title',
        'text',
        'link'
    ];
}
