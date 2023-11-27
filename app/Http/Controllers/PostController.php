<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        //MOVED TO categoryDropdown.php
//        $cat = Category::firstWhere('slug', request('category'));
//        $catid = $cat ? $cat->id : 0;

        $posts = $this->filterPosts()->paginate(6)
            ->withQueryString(); //includes the QueryString in the pagination links
        ############################
//        TO STYLE PAGINATION YOU MUST Publish the vendor files
//        php artisan vendor:publish
        //vendor is now located in: resources/views/vendor/pagination

        ############################



//        return $posts;
//        echo count($posts);die;

        return view('home', [
//            'posts' => $this->getPosts(),
            'posts' => $posts,

            //MOVED TO categoryDropdown.php for category-dropdown component, still provided for dropdown.blade.php as it doesnt have a component class in
            'categories' => Category::all()
//            'currentCategoryId' => $catid,
        ]);
    }

    protected function filterPosts()
    {

        //this is a custom model function named 'filter' that is called in the Post model
//        return Post::latest()->filter(request()->all())->get();
        return Post::latest()->filter(request(['search','category', 'author']));
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

    public function create()
    {
        //get logged in user
        $user = auth()->user();

        return view('posts.create', [
            'user' => $user
        ]);
    }

    public function edit(Post $post)
    {
        //get logged in user
        $user = auth()->user();

        return view('posts.edit', [
            'user' => $user,
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        //validate the form and set Post data
        $data = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:255',
            'thumbnail' => 'image', //max 2mb
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = \Illuminate\Support\Str::slug(request('title'));
        if(request()->file('thumbnail')){
            $data['thumbnail'] = request()->file('thumbnail')->store('public/thumbnails');
            //thumbnail public folder not accessible, so replace public with storage
            $data['thumbnail'] = str_replace('public', 'storage', $data['thumbnail']);
        }

        //check if slug is unique
        $slug = $data['slug'];

        //Count the number of posts with the same slug except the current post
        $count = Post::where('slug', 'like', $slug.'%')->where('id', '!=', $post->id)->count();
        if($count > 0){

            $data['slug'] = $slug.'-'.($count + 1); // this will be slug-2
        }

        //persist the new post
        $post->update($data);

        //redirect to previous page
        return redirect('/admin/post/'.$data['slug'])
            ->with('success', 'Post was updated!')
            ->with('created_post', $data);
    }

    public function list()
    {
        //get logged in user
        $user = auth()->user();

        //get all posts from user
        $posts = Post::where('user_id', $user->id)->get();

        return view('posts.list', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function store()
    {
        //validate the form
        $data = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:255',
            'thumbnail' => 'required|image', //max 2mb
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = \Illuminate\Support\Str::slug(request('title'));
        $data['thumbnail'] = request()->file('thumbnail')->store('public/thumbnails');

        //thumbnail public folder not accessible, so replace public with storage
        $data['thumbnail'] = str_replace('public', 'storage', $data['thumbnail']);

        //check if slug is unique
        $slug = $data['slug'];
        $count = Post::where('slug', 'like', $slug.'%')->count();
        if($count > 0){
            $data['slug'] = $slug.'-'.($count + 1); // this will be slug-2
        }

        //persist the new post
        Post::create($data);

        //redirect to previous page
        return redirect('/admin/post/create')
            ->with('success', 'Post was created!')
            ->with('created_post', $data);
    }

    public function  destroy(Post $post)
    {
//        dd($post);
        $post->delete();
        return redirect('/admin/post/create')
            ->with('success', 'Post was deleted!');
    }
}
