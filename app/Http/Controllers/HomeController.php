<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5; 

        if (!empty($keyword)) {
            $posts = Post::where('status','Approved')->paginate($perPage);
        } else {
            $posts = Post::where('status','Approved')->paginate($perPage);
        }

        return view('/pages.posts', compact('posts'));
    }
    public function blogs(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6; 

        if (!empty($keyword)) {
            $posts = Post::where('status','Approved')->paginate($perPage);
        } else {
            $posts = Post::where('status','Approved')->paginate($perPage);
        }

        return view('/pages.blog', compact('posts'));
    }
}
