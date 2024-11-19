<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostUserSeeder extends Seeder
{
    public function run()
    {
        // Create 5 users and 10 posts
        $users = User::factory(5)->create();
        $posts = Post::factory(10)->create();

        // Attach each post to a random set of users
        $posts->each(function ($post) use ($users) {
            // Attach the post to 1 to 3 random users
            $post->users()->attach($users->random(rand(1, 3))->pluck('id')->toArray());
        });
    }
}
