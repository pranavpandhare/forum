<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
    	$perPage = 5;
        $posts = Post::with('user')->where('status','Pending')->paginate($perPage);

		return view('admin.index', compact('posts'));
    }

    public function p_index(Request $request)
    {
    	$perPage = 5;
        $posts = Post::with('user')->where('status','Approved')->paginate($perPage);

		return view('admin.index', compact('posts'));
    }
    public function u_index(Request $request)
    {
    	$perPage = 5;
        $users = User::with('posts','profile')->paginate($perPage);

        //dd($posts[0]->profile->dp);

		return view('admin.user_index', compact('users'));
    }

    public function edit($id)
    {
        $posts = Post::with('user')->findOrFail($id);
        return view('admin.edit', compact('posts'));
    }

    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $posts = Post::findOrFail($id);
        $posts->update($requestData);

        return redirect('admin/')->with('flash_message', 'Status Updated!');
    }

    public function destroy($id, $img_name)
    {
        Post::destroy($id);
        unlink(public_path('img/'.$img_name));

        return redirect('/admin/')->with('flash_message', 'Post deleted!');
    }
    public function u_destroy($id, $dp)
    {
        User::destroy($id);
        unlink(public_path('img/dps/'.$dp));

        return redirect('/admin/')->with('flash_message', 'Post deleted!');
    }
}
