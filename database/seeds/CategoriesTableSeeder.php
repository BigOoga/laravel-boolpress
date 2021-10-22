<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Arr;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['#ff8640', '#4287f5', '#6259ff', '#00fffb', '#34c200', '#ff36eb', '#bfff00', '#915a00', '#106100', '#b86ca9', '#fcba03', '#00439c', '#7b24ff', '#ff0000'];
        //l To call just this seeder use can use php artisan db:seed --class=CategoriesTableSeeder
        $categories = ['Animals', 'Technology', 'Art', 'DIY', 'Cooking', 'TV', 'Videogames', 'Web dev', 'News', 'Nature'];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;

            //# Anti-dupe logic
            $colorsUsed = [];
            $correctlyFilled = false;
            while (!$correctlyFilled) {
                $newColor = Arr::random($colors);
                if (!Arr::has($colorsUsed, $newColor)) {
                    $newCategory->color = $newColor;
                    $correctlyFilled = true;
                    $colorsUsed[] = $newColor;
                }
            }
            $newCategory->save();
        }
    }
}
