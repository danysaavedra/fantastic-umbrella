<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'name' => $faker->sentence(3),
      'description' => $faker->sentence(12),
      'price' =>$faker->numberBetween(0,50) ,
      'avatar' => $faker->image('storage/app/public',400,300, null, false),
      'avatar1' =>$faker->image('storage/app/public',400,300, null, false),
      'avatar2' => $faker->image('storage/app/public',400,300, null, false),
      'avatar3' =>$faker->image('storage/app/public',400,300, null, false),
      'avatar4' =>$faker->image('storage/app/public',400,300, null, false),
    ];
});
