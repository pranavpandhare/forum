<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Profile;
use App\User;


class ProfilesController extends Controller
{
	public function index($id)
    {
        $perPage = 5;
  //       $user = \DB::table('users')->where('id','=', $id)->get();
		// $data = \DB::table('profiles')->where('user_id','=', $id)->get();
		//$data = Profile::findOrFail($id);
		//$posts = Post::where('user_id','=',$user[0]->id)->paginate($perPage);
		//dd($posts);

        $user = User::with('posts','profile')->findOrFail($id);

		return view('profile_dir.index', compact('user'));
        //return \View::make('profile_dir.index', compact('data', 'user'))->nest('profile_dir.show', compact('posts'));
        //$view = \View::make('profile_dir.index', $data, $user);
        //$view->nest('profile_dir.show', $posts);
        //return $view;
    }

    public function edit($id)
    {
        // $posts = Post::findOrFail($id);
        $user = auth()->user()->name;
        $data = Profile::where('user_id',$id)->get();
        return view('profile_dir.edit', compact('data','user'));
    }

    public function update(Request $request, $id, $dp)
    {
        $requestData = $request->all();
        if($request->hasFile('dp')){
            $file = $requestData['dp'];
            $file_name = $file->getClientOriginalName();
            $destinationPath = "img/dps/";
            if(\File::exists($destinationPath.$dp)){
                    unlink(public_path('img/dps/'.$dp));
            }
            if($file->move($destinationPath, $file_name)){
                $requestData['dp'] = $file_name;
            }
        }

        $profiles = Profile::findOrFail($id);
        $profiles->update($requestData);

        return redirect('/posts')->with('flash_message', 'Post updated!');
    }
}
