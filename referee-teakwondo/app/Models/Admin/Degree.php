<?php

namespace App\Models\Admin;

use App\Models\Home\Referee;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = [
        'name',
        'level'
    ];

    function referees(){
        return $this->hasMany(Referee::class);
    }
}
