<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatchVideoRequest;
use App\Http\Requests\UpdateMatchVideoRequest;
use App\Models\Home\MatchVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MatchVideoController extends Controller
{
    function addMatchVideo(){
        return view('admin.matchVideo.add-match-video');
    }

    function storeMatchVideo(StoreMatchVideoRequest $request){

        $request->validated();


        $matchVideo = new MatchVideo();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('coverMatchVideo'), $imageName);
            $matchVideo->image = $imageName;
        }
        $matchVideo->title = $request->title;
        $matchVideo->video = $request->video;

        $matchVideo->save();

        return redirect()->route('zodiac')->with('success', 'Match Video Added!');
    }

    function showMatchVideo(){

        $matchVideos = MatchVideo::orderBy('created_at', 'desc')->get();
        return view('admin.matchVideo.show-match-video')->with('matchVideos' , $matchVideos);
    }



    function removeMatchVideo($id){
        $matchVideo = MatchVideo::find($id);

        $image = public_path('coverMatchVideo/'.$matchVideo->image);

        if(File::exists($image)){
            File::delete($image);
        }
        $matchVideo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Match Video Removed',
        ], 201);
    }

    function editMatchVideo($id){
        $matchVideo = MatchVideo::find($id);

        return view('admin.matchVideo.edit-match-video')->with('matchVideo', $matchVideo);

    }

    function updateMatchVideo($id, UpdateMatchVideoRequest $request){
        $request->validated();
        $matchVideo = MatchVideo::find($id);

        if($request->hasFile('image')){
            $oldPhoto = public_path('coverMatchVideo/'.$matchVideo->image);
            if(File::exists($oldPhoto)){
                File::delete($oldPhoto);
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('coverMatchVideo'),$imageName);
            $matchVideo->image = $imageName;

        }
        if($request->filled('title')){
            $matchVideo->title = $request->title;
        }
        if($request->filled('video')){
            $matchVideo->video = $request->video;
        }

        $matchVideo->update();

        return redirect()->route('show-match-video')->with('success', 'Match Video Updated!');
    }

}
