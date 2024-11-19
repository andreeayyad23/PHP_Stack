<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),  // Creates a user for each post
            'title' => $this->faker->sentence,  // Generates a random sentence for title
            'content' => $this->faker->paragraph,  // Generates random content for post
        ];
    }
}
