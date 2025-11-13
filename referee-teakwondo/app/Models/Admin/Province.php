<?php

namespace App\Models\Admin;

use App\Models\Home\Referee;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name'
    ];


    function referees(){
        return $this->hasMany(Referee::class);
    }
    function gameMatch(){
        return $this->hasMany(GameMatch::class);
    }
}
