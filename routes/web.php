<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Symfony\Component\Yaml\Yaml;
use Spatie\YamlFrontMatter\YamlFrontMatter;

//use controller
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route to welcome view
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {

    return view('posts', [
        'posts' => Post::all()
    ]);
});

// Get a post using Route Model Binding
// Normally you would do this: {post:slug}
// But when getRouteKeyName() is overwritten in the Post model, you can do this: {post} as is the case in the Post model right now
// a Post model is provided (Post $post) in the function as a parameter for route model binding: Laravel will automatically fetch the post from the database based on the slug
Route::get('post/{post}', function (Post $post) { // Post::where('slug', $slug)->firstOrFail();
    return view('post', [
        'post' => $post
    ]);
});

//Find the post by using the Post model
//Route::get('post/{post}', function ($slug) {
//    //find a post by its slug from the Post model and return it
//    return view('post', [
//        'post' => App\Models\Post::find($slug)
//    ]);
//});

//get request with test returns foo => bar array as json
Route::get('test',function(){
    //call foobar function of the TestController
    return TestController::foobar();
});


Route::get('post2/{post}', function ($slug) {

    $path = "../resources/posts/{$slug}.html";

    if(!file_exists($path)){
        //shows debug info
//        ddd('file does not exist');
//        //returns 404 error
//        abort(404);

        return redirect('/');
    }

    $post = cache()->remember("posts.{$slug}", 5, function () use ($path) {
        //this will only be executed if the file does not exist in the cache, so when it will be stored in the cache and the next time it will be retrieved from the cache
        var_dump('file_get_contents');

        return file_get_contents($path);
    });

//    $post = file_get_contents($path);

    return view('post', [
        'post' => $post,
        'title' => $slug
    ]);
})->where('post','[A-z_\-]+'); //regular expression for the post var. It can only be letters, underscores and dashes

//go to testcontroller and execute createPosts function
Route::get('createPosts', [TestController::class, 'createPosts']);

//category route that shows all posts of a category
Route::get('category/{category:slug}', function (\App\Models\Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
