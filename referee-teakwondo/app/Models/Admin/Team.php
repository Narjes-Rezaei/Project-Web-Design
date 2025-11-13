<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'logo',
        'name',
        'number_of_member',
        'province_id',
        'gender_id',
    ];

    function province()
    {
        return $this->belongsTo(Province::class);
    }

    function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    function gameMatches()
    {
        return $this->belongsToMany(GameMatch::class);
    }

    function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
