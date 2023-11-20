<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'post_id'];

    public function author()
    {
        //An comment belongs to a single user(author)
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        // A comment belongs to a single post
        return $this->belongsTo(Post::class);
    }
}
