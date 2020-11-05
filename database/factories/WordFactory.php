<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    return [
        'text' => $faker->realtext(50),
        'impression' => $faker->realtext(100),
        'action' => $faker->realtext(200),
      
    ];
});
