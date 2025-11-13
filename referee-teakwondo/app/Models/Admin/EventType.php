<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $fillable = [
        'name'
    ];

    function gameMatch(){
        return $this->hasMany(GameMatch::class,'');
    }
}
