<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //category_id
            $table->foreignId('category_id');
            //user_id
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            //excerpt
            $table->text('excerpt');
            //body
            $table->text('body');
            //timestamps
            $table->timestamps();
            $table->timestamp('published_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

//create a post with one line
Post::create(['title' => 'My first post',
    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultrices ultrices, nunc nisl aliquam nunc, quis aliquet nunc nisl',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultrices ultrices, n',
    'category_id' => 1
]);
//another one
//Post::create(['title' => 'My second post', 'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultrices ultrices, nunc nisl aliquam nunc, quis aliquet nunc nisl', 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultrices ultrices, n', 'category_id' => 2]);
//another one
//Post::create(['title' => 'My third post', 'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultrices ultrices, nunc nisl aliquam nunc, quis aliquet nunc nisl', 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultrices ultrices, n', 'category_id' => 3]);
//another one
//
