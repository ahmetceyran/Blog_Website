<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function post_page()
    {

        return view('admin.post_page');

    }

    public function add_post(Request $request)
    {

        $user = Auth()->user();

        $post= new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->usertype = $user->usertype;

        $image=$request->image;

        if($image)
        {

            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);

            $post->image = $imagename;

        }
        

        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully');

    }

    public function show_post()
    {

        $post = post::all();

        return view('admin.show_post', compact('post'));

    }

}
