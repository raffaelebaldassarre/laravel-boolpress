<?php

use Faker\Generator as Faker;
use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++){
            $newTag = new Tag();
            $newTag->title = $faker->word;
            $newTag->save();
        }
    }
}
