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

            $post = post::where('post_status', '=', 'active')->get();

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

        $post = Post::where('post_status', '=', 'active')->get();

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

    public function my_posts()
    {
        $user=Auth::user();

        $userid = $user->id;

        $data = Post::where('user_id', '=', $userid)->get();

        return view('home.my_posts', compact('data'));

    }

    public function my_post_del($id)
    {

        $data = post::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully!');

    }

    public function post_update_page($id)
    {
        $post = post::find($id);

        return view('home.post_update', compact('post'));

    }

    public function update_post_data(Request $request, $id)
    {

        $data = post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;

        $image = $request->image;

        if($image)
        {

            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);

            $data->image = $imagename;

        }

        $data->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');

    }

}
