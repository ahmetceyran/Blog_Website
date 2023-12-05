<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    
    public function index()
    {

        if(Auth::id())
        {

            $post = post::all();

            $usertype = Auth()->user()->usertype;

            if($usertype == 'user')
            {

                return view('home.homepage', compact('post'));

            }
            else if($usertype == 'admin')
            {

                return view('admin.dashboard');

            }
            else
            {

                return redirect()->back();

            }

        }

    }

    public function homepage()
    {

        $post = Post::all();

        return view('home.homepage', compact('post'));

    }

    public function post_details($id)
    {

        $post = post::find($id);

        return view('home.post_details', compact('post'));

    }

    public function create_post()
    {

        return view('home.create_post');

    }

    public function user_post(Request $request)
    {
    
        $user = Auth()->user();

        $post = new post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'pending';
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

        Alert::success('Congrats', 'You Have Added The Post Successfully');

        return redirect()->back();

    }

}
