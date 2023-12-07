<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
class PostCommentsController extends Controller
{
    function store(Post $post, Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        //store comment
        $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id()
        ]);

        //flash a success message
        session()->flash('success', 'Comment was added');
        //go back to the post
        return back();
    }
}
