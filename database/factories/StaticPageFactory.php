<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\static_page;
use Faker\Generator as Faker;

$factory->define(static_page::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->sentence(5),
        'url'=>$faker->url,
        'content'=>$faker->paragraph
    ];
});
