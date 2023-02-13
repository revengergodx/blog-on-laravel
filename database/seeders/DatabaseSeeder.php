<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Category::factory(20)->create();
        $tags = Tag::factory(40)->create();
        $posts = Post::factory(200)->create();
        User::factory(50)->create();

        foreach ($posts as $post) {
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIds);

        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
