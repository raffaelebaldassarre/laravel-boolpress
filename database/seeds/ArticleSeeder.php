<?php

use Faker\Generator as Faker;
use App\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++){
            $newArticle = new Article();
            $newArticle->title = $faker->sentence(3);
            $newArticle->body = $faker->sentence(50);
            $newArticle->author = $faker->name();
            $newArticle->save();
        }
    }
}
