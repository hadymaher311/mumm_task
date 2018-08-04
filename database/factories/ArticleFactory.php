<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'subject' => $faker->word,
        'body' => $faker->realText(),
        'published_at' => $faker->dateTime(),
        'category_id' => function() {
        	return Category::all()->random();
        },
    ];
});
