<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOurBlogRequest;
use App\Http\Requests\UpdateOurBlogRequest;
use App\Models\OurBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurBlogController extends Controller
{
    //
    function showOurBlog(){
        $ourBlogs = OurBlog::all();

        return view('admin/ourBlog/show-our-blog')->with('ourBlogs', $ourBlogs);

    }

    function addOurBlog(){
        return view('admin/ourBlog/add-our-blog');
    }


    function storeOurBlog(StoreOurBlogRequest $request){

        $request->validated();

        $ourBlog = new OurBlog();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('coverOurBlog'), $imageName);
            $ourBlog->image = $imageName;
        }

        $ourBlog->title = $request->title;
        $ourBlog->text = $request->text;
        $ourBlog->link = $request->link;

        $ourBlog->save();

        return redirect()->route('show-our-blog')->with('success', 'Our Blog Added!');
    }


    function removeOurBlog($id){
        $ourBlog = OurBlog::find($id);

        $image = public_path('coverOurBlog/'. $ourBlog->image);

        if(File::exists($image)){
            File::delete($image);
        }

        $ourBlog->delete();

        return response()->json([
            'success' => true,
            'message' => 'Our Blog Removed',
        ], 201);
    }



    function editOurBlog($id){
        $ourBlog = OurBlog::find($id);

        return view('admin/ourBlog/edit-our-blog')->with('ourBlog', $ourBlog);

    }


    function updateOurBlog($id, UpdateOurBlogRequest $request){
        $request->validated();

        $ourBlog = OurBlog::find($id);

        if($request->hasFile('image')){
            $oldPhoto = public_path('coverOurBlog/'.$ourBlog->image);
            if(File::exists($oldPhoto)){
                File::delete($oldPhoto);
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('coverOurBlog'),$imageName);
            $ourBlog->image = $imageName;

        }
        if($request->filled('title')){
            $ourBlog->title = $request->title;
        }

        if($request->filled('text')){
            $ourBlog->text = $request->text;
        }

        if($request->filled('link')){
            $ourBlog->link = $request->link;
        }

        $ourBlog->update();

        return redirect()->route('show-our-blog')->with('success', 'Our Blog Updated!');
    }

}

