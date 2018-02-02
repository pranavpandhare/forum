<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\User;
use App\Comment;	
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        //$this->middleware('auth', [);'only' => ['create', 'store', 'edit', 'update', 'destroy', 'index']
        //$this->middleware('auth')->except(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;
        $user = auth()->user()->name;
        if (!empty($keyword)) {
            $posts = Post::where('user_id',auth()->user()->id)->paginate($perPage);
        } else {
            $posts = Post::where('user_id',auth()->user()->id)->paginate($perPage);
        }

        return view('post_dir.index', compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    	$user = auth()->user();
        return view('post_dir.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        if($request->hasFile('img_name')){
            $file = $request->img_name;
            $file_name = $file->getClientOriginalName();
            $destinationPath = public_path('img/');
            $file->move($destinationPath, $file_name);
            $requestData['img_name'] = $file_name;
        }
        
        Post::create($requestData);

        return redirect('/posts')->with('flash_message', 'Post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $posts = Post::with('comments','user')->findOrFail($id);
        // $posts = Post::findOrFail($id);
        // $userId = \DB::table('posts')->join('users','posts.user_id','=','users.id')->where('users.id','=',$posts->user_id)->select('users.id')->groupBy('users.id')->get();  
        // //$user1 = auth()->user()->name;
        // $user = \DB::table('posts')->join('users','posts.user_id','=','users.id')->where('users.id','=',$posts->user_id)->select('users.name')->groupBy('users.name')->get();
        // $comments = Comment::where('post_id',$id)->orderBy('updated_at', 'desc')->get();

        return view('post_dir.show', compact('posts'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  *
    //  * @return \Illuminate\View\View
    //  */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        $user = auth()->user()->name;
        return view('post_dir.edit', compact('posts','user'));
    }

    // *
    //  * Update the specified resource in storage.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @param  int  $id
    //  *
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     
    public function update(Request $request, $id, $img_name)
    {
        
        $requestData = $request->all();
        if($request->hasFile('img_name')){
            $file = $requestData['img_name'];
            $file_name = $file->getClientOriginalName();
            $destinationPath = "/var/www/html/forum/public/img/";
            if(\File::exists($destinationPath.$img_name)){
                    unlink(public_path('img/'.$img_name));
            }
            if($file->move($destinationPath, $file_name)){
                $requestData['img_name'] = $file_name;
            }
        }
        $Post = Post::findOrFail($id);
        $Post->update($requestData);

        return redirect('/posts')->with('flash_message', 'Post updated!');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  *
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  */
    public function destroy($id, $img_name)
    {
        Post::destroy($id);
        unlink(public_path('img/'.$img_name));

        return redirect('/posts')->with('flash_message', 'Post deleted!');
    }
}
