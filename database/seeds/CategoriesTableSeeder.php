<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //l To call just this seeder use can use php artisan db:seed --class=CategoriesTableSeeder
        $categories = ['Animals', 'Technology', 'Art', 'DIY', 'Cooking', 'TV'];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
