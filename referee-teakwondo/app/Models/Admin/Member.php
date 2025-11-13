<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'family',
        'birth_date',
        'gender_id',
        'province_id',
        'image',
        'email',
        'phone'
    ];


    function province()
    {
        return $this->belongsTo(Province::class);
    }

    function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    function team(){
        return $this->belongsTo(Team::class);
    }
}
