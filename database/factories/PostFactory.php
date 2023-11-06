<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            //create a post with one line
            'title' => $this->faker->sentence(),
            //create the slug from the title
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            //create a random category id between 1 and 3
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 10)

            //here you can define category_id and user_id with factories, it creates a user or category when creating a post and assigns the id to the post
            //create category with factory when defining category_id
//            ,'category_id' => Category::factory()
            //create user with factory when defining user_id
//            ,'user_id' => User::factory()
        ];
    }
}
