<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use SebastianBergmann\ObjectReflector\ObjectReflector;

//to create a new user, run the following command:
//php artisan tinker
//App\Models\User::factory()->create(['name' => 'admin', 'email' => 'admin@example', 'password' => 'password', 'is_admin' => true]);
//exit
//OR do this:
//> $user = new User();
//[!] Aliasing 'User' to 'App\Models\User' for this Tinker session.
//= App\Models\User {#6274}
//
//    > $user->name = 'ryan'
//        = "ryan"
//
//        > $user->email = 'ryan@live.nl'
//            = "ryan@live.nl"
//
//            > $user->password = bcrypt('p4ssw0rd')
//                = "$2y$10$vRyWUO6qvKTDR8flavlRW.lpJ.wzPC/RWwgbuk5Ur44l4u.sZqeti"
//
//                > $user->save();
//    = true


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
