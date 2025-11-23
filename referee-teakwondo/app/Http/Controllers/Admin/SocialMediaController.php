<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\Models\Admin\SocialMedia;

class SocialMediaController extends Controller
{
    function showSocialMedia()
    {
        $socialMedia = SocialMedia::all();
        $empty = SocialMedia::exists();
        // dd($empty);

        return view('admin/socialMedia/show-social-media')
        ->with('socialMedia', $socialMedia)
        ->with('empty' , $empty);
    }


    function addSocialMedia()
    {
        return view('admin/socialMedia/add-social-media');
    }

    function storeSocialMedia(StoreSocialMediaRequest $request)
    {
        $request->validated();

        $socialMedia = new SocialMedia();

        $socialMedia->twitter = $request->twitter;
        $socialMedia->facebook = $request->facebook;
        $socialMedia->youtube = $request->youtube;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->telegram = $request->telegram;

        $socialMedia->save();

        return redirect()->route('show-social-media')->with('success' , 'Social Media Added');
    }

    function editSocialMedia($id)
    {
        $socialMedia = SocialMedia::find($id);

        return view('admin/socialMedia/edit-social-media')->with('socialMedia', $socialMedia);
    }


    function updateSocialMedia(UpdateSocialMediaRequest $request, $id)
    {
        $socialMedia = SocialMedia::find($id);

        $socialMedia->twitter = $request->twitter;
        $socialMedia->facebook = $request->facebook;
        $socialMedia->youtube = $request->youtube;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->telegram = $request->telegram;

        $socialMedia->update();

        return redirect()->route('show-social-media')->with('success', 'Social Media Updated!');
    }

    function removeSocialMedia($id)
    {
        $socialMedia = SocialMedia::find($id);

        $socialMedia->delete();

        return response()->json([
            'success' => true,
            'message' => 'Social Media Removed',
        ], 201);
    }
}
