<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\video_page;
use Faker\Generator as Faker;

$factory->define(video_page::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence(5),
        'url'=> $faker->url,
        'description'=>$faker->paragraph,
    ];
});
