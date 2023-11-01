<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    static function foobar()
    {
        return ['foo' => 'barTestControllerrr'];
    }

    public function createPosts() {

        //use model post
        //create a post using the post model
//        $post = Post::create([
//            'title' => 'My first post',
//            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
//            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
//            'category_id' => 1
//        ]);
        // now create 3 more posts
//        Post::create(['title' => 'My second post', 'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'category_id' => 2]);

    }
}
