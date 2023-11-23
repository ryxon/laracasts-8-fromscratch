<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use models
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //truncate all tables to prevent duplicate entries
//        User::truncate();
//        Post::truncate();
//        Category::truncate();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Create 10 factory users
        User::factory(10)->create();
        //what is the command to run db seeders?
        //php artisan db:seed

        //create 1 admin user:
        //name: Ryan Hendriks
        //username: ryxon
        //email: ryan@ryxondev.nl
        //password: p4ssw0rd
        //is_admin: 1
        //api_token: Str::random(60);
        User::factory()->create([
            'id' => 11, //this is optional
            'name' => 'Ryan Hendriks',
            'username' => 'ryxon',
            'email' => 'ryan@ryxondev.nl',
            'password' => bcrypt('p4ssw0rd'),
            'is_admin' => 1,
            'api_token' => Str::random(60)
        ]);

        //now create 3 categories
        Category::create([
            'id' => 1, //this is optional
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Category::create([
            'id' => 2, //this is optional
            'name' => 'Work',
            'slug' => 'work'
        ]);
        Category::create([
            'id' => 3, //this is optional
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        //now create 10 posts
        Post::factory(50)->create();
        //command to create a post factory
        //php artisan make:factory PostFactory


    }
}
