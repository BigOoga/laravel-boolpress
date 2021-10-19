<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->title = $faker->text(50);
            $post->content = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(640, 480, 'animals', true);
            $post->slug = Str::of($post->title)->slug('-');
            $post->save();
        }
    }
    /*
    public function run()
    {
        l Here we can write the logic to fill the tuples
         $newPost = new Post();
           $newPost->title = $title;
           $newPost->description = $description;
           $newPost->image = $image;




    }*/
}
