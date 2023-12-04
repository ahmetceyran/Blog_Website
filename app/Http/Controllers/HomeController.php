<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

}
