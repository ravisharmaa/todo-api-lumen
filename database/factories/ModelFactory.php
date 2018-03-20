<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Todo::class, function (Faker\Generator $faker) {
    return [
        'user_id'=> function() {
            return factory(App\User::class)->create()->id;
        },
        'title'=> $faker->text('500'),
        'completed'=>$faker->boolean(2)
    ];
});

