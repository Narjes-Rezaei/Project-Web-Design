<?php

namespace App\Models\Home;

use App\Models\Admin\Degree;
use App\Models\Admin\GameMatch;
use App\Models\Admin\Gender;
use App\Models\Admin\Province;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Referee extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $guard = 'referee';

    protected $hidden = ['password'];

    public $incrementing = false; // اگر referee_id دستی ست میشه
    protected $keyType = 'int';   // یا string اگر کد خاص داری


    protected $primaryKey = 'referee_id';
    protected $fillable = [
        'referee_id',
        'national_code',
        'name',
        'family',
        'degree_id',
        'birth_year',
        'gender_id',
        'province_id',
        'image',
        'email',
        'phone',
        'password'
    ];


    function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    function province()
    {
        return $this->belongsTo(Province::class);
    }

    function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function gameMatches()
    {
        return $this->belongsToMany(GameMatch::class, 'referee_match')
            ->withPivot(['is_present', 'is_best_referee', 'score', 'is_observer'])
            ->withTimestamps();
    }
}
