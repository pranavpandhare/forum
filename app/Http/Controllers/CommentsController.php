<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;
        $user = auth()->user()->name;
        if (!empty($keyword)) {
            $comments = Comment::where('user_id',auth()->user()->id)->paginate($perPage);
        } else {
            $comments = Comment::where('user_id',auth()->user()->id)->paginate($perPage);
        }

        return view('comm_dir.index', compact('comments','user'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        
        Comment::create($requestData);

        return redirect('/posts/' . $request->post_id)->with('flash_message', 'Comment added!');
    }

    public function show($id)
    {
        $comments = Comment::where('id',$id)->select('post_id')->get();


        //return redirect('/posts/' . $comments[0]->post_id);
        $URL = '/posts/'. $comments[0]->post_id;
        return Redirect::to($URL . "#id");

    }

    public function edit($id)
    {
        $comments = Comment::findOrFail($id);
        $user = auth()->user()->name;
        return view('comm_dir.edit', compact('comments','user'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
        $comments = Comment::findOrFail($id);
        $comments->update($requestData);

        return redirect('comments')->with('flash_message', 'Comment updated!');
    }

    public function destroy($id)
    {
        Comment::destroy($id);

        return redirect('/comments')->with('flash_message', 'Comment deleted!');
    }
}
