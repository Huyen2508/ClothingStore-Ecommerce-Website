<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $title='Cate 1';
    $title1='Cate 2';
    return [

       [ 'name'=>$title,
        'slug'=>$title,],
        [ 'name'=>$title1,
        'slug'=>$title1,]
    ];
});
