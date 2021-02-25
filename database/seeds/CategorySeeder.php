<?php

use Faker\Generator as Faker;
use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++){
            $newCategory = new Category();
            $newCategory->title = $faker->words(3, true);
            $newCategory->description = $faker->sentence(20);
            $newCategory->save();
        }
    }
}
