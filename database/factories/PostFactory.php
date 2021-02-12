<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'userId'=>'6',
        'postTitle' => $faker->sentence(),
        'postDescription' => $faker->paragraph,
        'upvote'=>$faker->numberBetween(0,1000),
    ];
});
