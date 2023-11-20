<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Post;
use \App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //create 10 comments for specific page_id of 155
//        Comment::factory(10)->create(['post_id' => 155]);

        return [
            'body' => $this->faker->paragraph,
            'post_id' => Post::factory(),
            'user_id' => User::factory()
        ];
    }
}
