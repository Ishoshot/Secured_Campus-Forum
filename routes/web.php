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
Route::get('/', function() {
	
	$categories = App\Category::with('posts')->orderBy('title', 'asc')->get();

    $posts = App\Post::latest()->paginate(3);

    $mrPosts = App\Post::inRandomOrder()->take(5)->get();

    return view('welcome', compact('posts', 'mrPosts', 'categories'));

});


Auth::routes(['verify' => true]);

Route::get('/posts/create', 'PostsController@create');

Route::get('/home', 'PostsController@index');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/{post}/edit', 'PostsController@edit');

Route::patch('/posts/{post}', 'PostsController@update')->name('post.update');

Route::get('/posts/categories/{id}', 'PostsController@category');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::post('/posts/delete/{post}', 'PostsController@delete')->name('post.destroy');

Route::post('/comments/delete/{comment}', 'CommentsController@delete')->name('comment.destroy');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


