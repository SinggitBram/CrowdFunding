<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chat;
use App\User;
use Faker\Generator as Faker;

$factory->define(Chat::class, function (Faker $faker) {
    return [
        'subject' => $faker->name,
        'user_id' => User::all()->random()->id,
    ];
});
