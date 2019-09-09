<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
    	$data = request()->validate([
            'comment' => ['required','min:3'],
        ]);

    	auth()->user()->comments()->create([
            'body' => $data['comment'],
            'post_id' => $post->id,
        ]);

        session()->flash('status','Your Comment was Added');

        return back();
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        
        session()->flash('status','Your Comment was Deleted');

        return back();
    }
}
 