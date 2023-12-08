<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //get all comments without pagination
        $comments = Comment::all();

        //sent to view
        return view('admin.comments.index', compact('comments'));
    }

    public function approve()
    {
        //get comment id and echo it
        $comment = Comment::find(request('comment'));

        //set field approved to 1 and flash back a success message
        $comment->approved = 1;
        $comment->declined = 0;
        $comment->save();
        session()->flash('success', 'Comment was approved');
        return back();
    }

    public function decline()
    {
        //get comment id and echo it
        $comment = Comment::find(request('comment'));

        //set field approved to 1 and flash back a success message
        $comment->approved = 0;
        $comment->declined = 1;
        $comment->save();
        session()->flash('success', 'Comment was declined');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function test()
    {
        return 'test';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
    echo 123;
//        //store comment
//        $comment = Comment::create([
//            'body' => $request->body,
//            'user_id' => auth()->id(),
//            'post_id' => $request->post_id
//        ]);
//        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //delete the comment and flash back
        $comment->delete();
        session()->flash('success', 'Comment was deleted');
        return back();
    }
}
