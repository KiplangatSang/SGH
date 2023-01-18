<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articles\Categories;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        //

        'categoryable_id' =>rand(1,2),
        'categoryable_type' =>"App\User",
        'category' =>"Poems",
        'category_description' =>"Short Poems",
        'category_class' =>"Art",


    ];
});
