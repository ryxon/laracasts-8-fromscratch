<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class PostController extends Controller
{
    public function index()
    {
        return view('home', [
//            'posts' => $this->getPosts(),
            'posts' => $this->filterPosts(),
            'categories' => Category::all(),
            'currentCategoryId' => (int)Category::firstWhere('slug', request('category'))
        ]);
    }

    protected function filterPosts()
    {

        //this is a custom model function named 'filter' that is called in the Post model
        return Post::latest()->filter(request()->all())->get();
        //using request(['search']) with brackets is the same as using request()->only('search')
        //the brackets make it an array, so it can be used in the filter function
    }

    protected function getPosts()
    {
        //check if search is filled, get the results with the 'category' and 'user' relationship and return them
        if(request('search')){
            $posts = Post::where('title', 'like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%')
                ->with('category', 'user')
                ->get();
        } else {
            $posts = Post::with('category','user')->get();
        }
        return $posts;
    }
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }
}
