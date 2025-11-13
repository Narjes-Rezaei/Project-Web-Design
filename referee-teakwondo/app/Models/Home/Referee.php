<?php

namespace App\Models\Home;

use App\Models\Admin\Degree;
use App\Models\Admin\GameMatch;
use App\Models\Admin\Gender;
use App\Models\Admin\Province;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    protected $fillable = [
        'national_code',
        'name',
        'family',
        'degree_id',
        'birth_year',
        'gender_id',
        'province_id',
        'image',
        'email',
        'phone'
    ];


    function degree(){
        return $this->belongsTo(Degree::class);
    }

    function province(){
        return $this->belongsTo(Province::class);
    }

    function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function gameMatches()
    {
        return $this->belongsToMany(GameMatch::class, 'referee_match')
                    ->withPivot(['is_present', 'is_best_referee', 'score', 'is_observer'])
                    ->withTimestamps();
    }
}


