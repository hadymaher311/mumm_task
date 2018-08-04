<?php

use App\Models\Article;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'user_id' => function() {
        	return User::all()->random();
        },
        'article_id' => function() {
        	return Article::all()->random();
        }
    ];
});
