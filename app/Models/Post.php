<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //allow mass assignment of all fields
    protected $fillable = ['title', 'excerpt', 'body', 'category_id', 'slug'];

    //guard id from mass assignment
    protected $guarded = ['id'];

    //this will be loaded by default, to prevent n+1 problem
//    protected $with = ['category', 'user'];
//   then when loading posts without category and user, use this:
//    Post::without('category', 'user')->get();

    //posts have one category
    public function category()
    {
        //all relationship types: hasOne, hasMany, belongsTo, belongsToMany, morphOne, morphMany, morphTo, morphToMany, morphedByMany
        return $this->belongsTo(Category::class);
    }

    //set route key to slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //extend create function to include slug from title value
    public static function create(array $attributes = [])
    {
        $attributes['slug'] = str_slug($attributes['title']);
        return static::query()->create($attributes);
    }

    //find by id or slug with find method
//    public static function find($slug)
//    {
//        //check if slug is numeric
//        if (!is_numeric($slug)) {
//            return static::where('slug', $slug)->first();
//        }else{
//            return static::where('id', $slug)->first();
//        }
//    }
//
//    //find by id or slug with findOrFail method
//    public static function findOrFail($slug)
//    {
//        //check if slug is numeric
//        if (!is_numeric($slug)) {
//            return static::where('slug', $slug)->firstOrFail();
//        }else{
//            return static::where('id', $slug)->firstOrFail();
//        }
//    }
}
function str_slug($title) {
    $slug = strtolower($title);
    $slug = preg_replace("/[^a-z0-9_\s-]/", "", $slug);
    $slug = preg_replace("/[\s-]+/", " ", $slug);
    $slug = preg_replace("/[\s_]/", "-", $slug);
    return $slug;
}
