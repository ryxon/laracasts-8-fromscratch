<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 50 comments
        \App\Models\Comment::factory()->count(50)->create();
    }

    public function test() {
        // create 50 comments
        \App\Models\Comment::factory()->count(50)->create();
    }


}
// run this seeder individually with:
// php artisan db:seed --class=CommentSeeder

// or run the default DatabaseSeeder.php with:
// php artisan db:seed
// this will not run other seeders, only the default DatabaseSeeder.php
// then toi run this seeder within the code of DatabaseSeeder.php, add this line:
// $this->call(CommentSeeder::class);
