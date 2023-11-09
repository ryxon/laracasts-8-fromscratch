<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class PostController extends Controller
{
    public function index()
    {
        //MOVED TO categoryDropdown.php
//        $cat = Category::firstWhere('slug', request('category'));
//        $catid = $cat ? $cat->id : 0;

        return view('home', [
//            'posts' => $this->getPosts(),
            'posts' => $this->filterPosts(),

            //MOVED TO categoryDropdown.php for category-dropdown component, still provided for dropdown.blade.php as it doesnt have a component class in
            'categories' => Category::all()
//            'currentCategoryId' => $catid,
        ]);
    }

    protected function filterPosts()
    {

        //this is a custom model function named 'filter' that is called in the Post model
//        return Post::latest()->filter(request()->all())->get();
        return Post::latest()->filter(request(['search','category', 'author']))->get();
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

    public function author($username)
    {
        $filters['author'] = $username;
        return view('home', [
            'posts' => Post::latest()->filter($filters)->get(),
            //MOVED TO categoryDropdown.php for category-dropdown component, still provided for dropdown.blade.php as it doesnt have a component class in
            'categories' => Category::all()
        ]);
    }
}
