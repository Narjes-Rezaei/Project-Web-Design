<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\MatchVideo;
use App\Models\OurBlog;

class MasterController extends Controller
{
    function master(){
        $matchVideos = MatchVideo::orderBy('created_at', 'desc')->get();

        $ourBlogs = OurBlog::orderBy('created_at', 'desc')->get();


        return view('index/master')->with('matchVideos', $matchVideos)->with('ourBlogs', $ourBlogs);
    }

    function matches(){
        return view('index/pages/matches');
    }

    function players(){
        return view('index/pages/players');
    }

    function blog(){
        return view('index/pages/blog');
    }

    function contact(){
        return view('index/pages/contact');
    }




}
