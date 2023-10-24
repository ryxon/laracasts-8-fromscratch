<?php

namespace App\Models;
use Illuminate\Support\Facades\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Yaml\Yaml;
use Spatie\YamlFrontMatter\YamlFrontMatter;
class Post extends Model
{
    use HasFactory;

    public $title;
    public $date;
    public $excerpt;
    public $slug;
    public $body;

    public function __construct($title, $date, $excerpt, $slug, $body)
    {
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
        $this->body = $body;
    }

    public static function allPosts() {

        return cache()->rememberForever('posts.all', function(){
            //Using a collection; "array on streoids": Collections allows you to filter, map, reduce, etc. arrays
            return collect(File::files(resource_path("posts/")))
                //mapping over the files and returning a new array with the parsed yaml front matter
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                //using the previously mapped array and mapping over it to return a new array with the Post model
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->date,
                    $document->excerpt,
                    $document->slug,
                    $document->body()
                ))
                ->sortByDesc('date');
        });

        //check cache in the terminal with
        //php artisan tinker
        //cache()->forget('posts.all');
        //cache('posts.all')
        //cache()->get('posts.all')


//        $files = File::files(resource_path("posts/"));
//        $posts = [];
//
//        foreach ($files as $file) {
//            $document = YamlFrontMatter::parseFile($file);
//
////        print_r($document->matter());
//
//            $posts[] = new Post(
//                $document->title,
//                $document->date,
//                $document->excerpt,
//                $document->slug,
//                $document->body()
//
//            );
//        }
//
//        return $posts;

//        $files = File::files(resource_path("posts/"));
//        $files = array_map(function ($file) {
//            return $file->getContents();
//        }, $files);
//        return $files;
    }

    public static function find($slug)
    {
        $posts = static::allPosts();
        $post = $posts->firstWhere('slug', $slug);
//        dd($post);

        return $post;
    }
}

//static find method to find a post by its slug
//public static function find($slug)
//{
//    //find a post by its slug from the Post model and return it
//    $path = resource_path("posts/{$slug}.html");
//
//    if(!file_exists($path)) {
//        //shows debug info
//        throw new ModelNotFoundException();
//    }
//
//    $post = cache()->remember("posts.{$slug}", 5, function () use ($path) {
//        //this will only be executed if the file does not exist in the cache, so when it will be stored in the cache and the next time it will be retrieved from the cache
//        var_dump('file_get_contents');
//
//        return file_get_contents($path);
//    });
//
//    return $post;
//}
