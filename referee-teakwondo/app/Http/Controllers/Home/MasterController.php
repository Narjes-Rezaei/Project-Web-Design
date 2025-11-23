<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\GameMatch;
use App\Models\Admin\SocialMedia;
use App\Models\Admin\Team;
use App\Models\Home\MatchVideo;
use App\Models\Home\Referee;
use App\Models\OurBlog;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function findVS()
    {
        $nearest = GameMatch::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->first();

        if (!$nearest) {
            return null;
        }

        $rows = DB::table('team_match')
            ->where('match_id', $nearest->id)
            ->get();
        $max_hour = 0;
        $select_row = null;
        foreach ($rows as $row) {
            if ($row->hour > $max_hour) {
                $max_hour = $row->hour;
                $select_row = $row;
            } elseif ($row->hour == $max_hour) {
                if ($row->min < $select_row->min) {
                    $select_row = $row;
                }
            }
        }

        return $select_row;
    }

    function master()
    {
        // early team data
        $team_record = $this->findVS();

        if ($team_record) {
            $members_team1 = DB::table('members')
                ->where('team_id', $team_record->team1_id)
                ->get();

            $members_team2 = DB::table('members')
                ->where('team_id', $team_record->team2_id)
                ->get();

            $team1 = Team::find($team_record->team1_id);
            $team2 = Team::find($team_record->team2_id);

            $match = GameMatch::find($team_record->match_id);
            $targetDate = $match ? $match->event_date->format('Y/m/d H:i:s') : null;
        } else {
            $members_team1 = collect();
            $members_team2 = collect();

            $team1 = null;
            $team2 = null;

            $targetDate = null;
        }

        $referees = Referee::all();

        $matchVideos = MatchVideo::orderBy('created_at', 'desc')->get();
        $ourBlogs = OurBlog::orderBy('created_at', 'desc')->get();
        $socialMedia = SocialMedia::first();

        if (!$socialMedia) {
            $socialMedia = (object)[
                'twitter' => '#',
                'facebook' => '#',
                'instagram' => '#',
                'telegram' => '#',
                'youtube' => '#',
            ];
        }

        return view('index/master')
            ->with('matchVideos', $matchVideos)
            ->with('ourBlogs', $ourBlogs)
            ->with('members_team1', $members_team1)
            ->with('members_team2', $members_team2)
            ->with('team1', $team1)
            ->with('team2', $team2)
            ->with('targetDate', $targetDate)
            ->with('referees', $referees)
            ->with('socialMedia', $socialMedia);
    }



    function matches()
    {
        return view('index/pages/matches');
    }

    function players()
    {
        return view('index/pages/players');
    }

    function blog()
    {
        return view('index/pages/blog');
    }

    function contact()
    {
        return view('index/pages/contact');
    }
}
