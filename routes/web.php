<?php

use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Symfony\Component\Yaml\Yaml;
use Spatie\YamlFrontMatter\YamlFrontMatter;

//use controller
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;
use App\Services\Newsletter;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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
//use admin middleware
Route::middleware('admin')->group(function () {

    Route::get('admin/post/create', [PostController::class, 'create']);
    Route::post('admin/post', [PostController::class, 'store']);
    Route::get('admin', function () { return view('admin.index'); });
    Route::delete('admin/post/{post}', [PostController::class, 'destroy']);
    Route::get('admin/post/{post}', [PostController::class, 'edit']);
    //patch request to update post by id  (post/{post:id})
    Route::patch('admin/post/{post:id}', [PostController::class, 'update']);
    Route::get('admin/posts', [PostController::class, 'index']);
    //dashboard
    Route::get('admin/dashboard', function () { return view('admin.dashboard'); });
    Route::get('admin/categories', [CategoryController::class, 'index']);
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('admin/categories/{category:id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('admin/categories/{category:id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('admin/categories/{category:id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //comments
//    Route::post('post/{post}/comment', [PostCommentsController::class, 'store']);
    Route::get('admin/comments', [CommentController::class, 'index']);
    Route::delete('admin/comments/{comment:id}', [CommentController::class, 'destroy'])->name('admin.comment.destroy');
    Route::patch('admin/comments/{comment:id}/approve', [CommentController::class, 'approve'])->name('admin.comment.approve');
    Route::patch('admin/comments/{comment:id}/decline', [CommentController::class, 'decline'])->name('admin.comment.decline');

    //users
    //user index using controller
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    //edit
    Route::get('admin/users/{user:id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    //create
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    //store
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    //update
    Route::patch('admin/users/{user:id}', [UserController::class, 'update'])->name('admin.users.update');
    //delete
    Route::delete('admin/users/{user:id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

//instead uses admin gate defined in AppServiceProvider.php:boot
Route::middleware('can:admin')->group(function () {
    Route::get('admin/dashboard', function () { return view('admin.dashboard'); });
});

//logged in users that are not admins
Route::middleware('auth')->group(function () {
    Route::post('post/{post}/comment', [PostCommentsController::class, 'store']);
});

//Test mailchimp api
Route::post('subscribe',NewsletterController::class);

//REGISTER
//route to register view
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');

//route to register store function
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('logout', [SessionsController::class, 'destroy']);

Route::get('login', [SessionsController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'login'])->middleware('guest');



//re-route /home to /
//Route::get('/home', function () {
//    return redirect('/');
//});

//route to welcome view
Route::get('/welcome', function () {
    return view('welcome');
});

//Route / to PostController index function
Route::get('/', [PostController::class, 'index'])->name('home');

//category route that shows all posts of a category
Route::get('category/{category:slug}', function (\App\Models\Category $category) {
    return view('home', [
        'posts' => $category->posts->load(['category', 'user']),
        'categories' => Category::all(),
        'currentCategory' => Category::firstWhere('slug', request('category'))
    ]);
});


Route::get('/posts', function () {

    //logs all queries that are executed including the bindings
    \Illuminate\Support\Facades\DB::listen(function ($query) {
        logger($query->sql, $query->bindings);
    });

    return view('posts', [
//        'posts' => Post::all()
        //use with to prevent n+1 problem, so only 2 queries will be executed instead of 1 + the number of posts
        'posts' => Post::with('category','user')->get()
    ]);
});



// Get a post using Route Model Binding
// Normally you would do this: {post:slug}
// But when getRouteKeyName() is overwritten in the Post model, you can do this: {post} as is the case in the Post model right now
// a Post model is provided (Post $post) in the function as a parameter for route model binding: Laravel will automatically fetch the post from the database based on the slug

//Route::get('post/{post}', function (Post $post) { // Post::where('slug', $slug)->firstOrFail();
//    return view('post', [
//        'post' => $post
//    ]);
//});
//new routed to controller
Route::get('post/{post}', [PostController::class, 'show'])->name('home.post'); //(Post $post) is giving in the controller as a parameter for route model binding

Route::get('author/{username}', [PostController::class, 'author']);

Route::get('posts/author/{user:username}', function (\App\Models\User $user) {
    return view('posts', [
        //get posts from user but preven n+1 problem
        'posts' => $user->posts->load(['category', 'user'])
        //Why are we using load here instead of with?
        //Because we are not using the posts relationship on the user model, but the posts property on the user model
    ]);
});



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



