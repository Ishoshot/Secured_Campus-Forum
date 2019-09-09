<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Category;

class PostsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // $users =  auth()->user()->pluck('id');

        // $posts = Post::whereIn('id', $users)->with('user')->latest()->paginate(12);

        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

        $posts = Post::latest()->paginate(3);

        $mrPosts = Post::inRandomOrder()->take(5)->get();

        return view('posts.index', compact('posts', 'mrPosts', 'categories'));
    }


    public function category($id)
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

        $posts = Post::latest()->where('category_id',$id)->paginate(3);

        $mrPosts = Post::inRandomOrder()->where('category_id',$id)->take(5)->get();

        return view('posts.index', compact('posts', 'mrPosts', 'categories'));
    }


    public function create()
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

    	return view('posts.create', compact('categories'));
    }

    public function store()
    {
    	$data = request()->validate([
            'title' => ['required','min:5'],
            'description' => ['required','min:30'],
            'category' => 'required',
            'image' => ['required','image'],
        ]);

    	$imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(700,700);
        
        $image->save();

    	auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'category_id' => $data['category'],
            'image' => $imagePath,
        ]);

    	$authId = auth()->user()->id;

        session()->flash('status','You successfully created a post');

        return redirect('/profile/'. $authId);
    	
    }

    public function show(Post $post)
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

        $mrPosts = Post::take(6)->latest()->get();

        return view('posts.show', compact('post','mrPosts','categories'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post->user->profile);

        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

        return view('posts.edit', compact('post','categories'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post->user->profile);

        $dat = request()->validate([
            'title' => 'required',
            'description' => ['required','min:30'],
            'category' => 'required',
            'image' => ['','image'],
        ]);

        $data = [
            'title' => $dat['title'],
            'description' => $dat['description'],
            'category_id' => $dat['category'],
        ];


        if (request('image'))
        {
            $imagePath = request('image')->store('uploads','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(700,700);
            $image->save();
            $imageArray =  ['image' => $imagePath];
        }
        
        $post->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        $authId = auth()->user()->id;

        session()->flash('status','Post was Updated Succesfully');

        return redirect('/profile/'. $authId);

    }

    public function delete(Post $post)
    {
        $post->delete();
        
        session()->flash('status','Your Post was Deleted');

        return back();
    }

}
