<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@blogs')->name('home');

Route::get('/posts', 'HomeController@index');
Route::get('/blogs', 'HomeController@blogs');

// Route::get('/post/{id}', function () {
//     return view('pages.post');
// });

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware' => 'auth'], function()
// {
    Route::resource('posts', 'PostsController');
    Route::delete('/posts/{id}/{img_name}', 'PostsController@destroy');
    Route::patch('/posts/{id}/{img_name}', 'PostsController@update');
// });

Route::group(['middleware' => 'auth'], function(){
	// Route::get('/myprofile/{id}', function () {
	// 	$id = request()->route('id');
	// 	$user = DB::table('users')->where('id','=', $id)->get();
	// 	$data = DB::table('profiles')->where('user_id','=', $id)->get();
	
 //    	return view('profile_dir.index',compact('data','user'));
	// });
	Route::resource('profiles', 'ProfilesController');
	Route::get('/myprofile/{id}', 'ProfilesController@index');
	Route::patch('/profiles/{id}/{dp}', 'ProfilesController@update');

	Route::resource('comments', 'CommentsController');
});

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/posts/{id}/edit', 'AdminController@edit');
    Route::patch('/posts/{id}', 'AdminController@update');
    Route::delete('/posts/{id}/{img_name}', 'AdminController@destroy');
    Route::get('/p_index', 'AdminController@p_index');
    Route::get('/users/', 'AdminController@u_index');
    Route::delete('/user/{id}/{dp}', 'AdminController@u_destroy');
});