<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class MatchVideo extends Model
{
    protected $fillable = [
        'title',
        'image',
        'video',
    ];
}
