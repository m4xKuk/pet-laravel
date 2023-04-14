<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(15)->create();
        $users = User::factory(8)->create();
        $posts = Post::factory(25)->create();

        foreach($posts as $post){
            $categoryIds = $categories->random(5)->pluck('id');
            $post->categories()->attach($categoryIds);

            $userId = $users->random()->id;
            $post->user()->associate($userId);
        }
    }
}
