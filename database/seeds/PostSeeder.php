<?php

use App\Category;
use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 50) -> make() -> each(function($post) {

            $category = Category::inRandomOrder() -> limit(1) -> first();
            $post -> test() -> associate($category);

            $post -> save();
        });
    }
}
