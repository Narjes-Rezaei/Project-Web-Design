<?php

namespace App\Models\Admin;

use App\Models\Home\Referee;
use Illuminate\Database\Eloquent\Model;

class GameMatch extends Model
{

    protected $table = 'matches';
    protected $casts = [
    'event_date' => 'datetime',
];
    protected $fillable = [
        'event_title',
        'event_date',
        'province_id',
        'event_rank_id',
        'event_type_id',
    ];

    // GameMatch.php
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_match', 'match_id', 'team_id');
    }

    // GameMatch.php
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }



    public function referees()
    {
        return $this->belongsToMany(Referee::class, 'referee_match')
            ->withPivot(['is_present', 'is_best_referee', 'score', 'is_observer'])
            ->withTimestamps();
    }

    function province()
    {
        return $this->belongsTo(Province::class);
    }

    function eventRank()
    {
        return $this->belongsTo(EventRank::class, 'event_rank_id');
    }

    function eventType()
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }
}
