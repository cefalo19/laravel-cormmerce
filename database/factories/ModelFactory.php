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

$factory->define('CodeCommerce\Category', function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define('CodeCommerce\Product', function ($faker) {
    return [
        'category_id' => $faker->numberBetween(1, 5),
        'name'        => $faker->word,
        'description' => $faker->sentence,
        'price'       => $faker->randomNumber,
        'featured'    => $faker->randomElement(array(null, 1)),
        'recommend'   => $faker->randomElement(array(null, 1))
    ];
});

$factory->define('CodeCommerce\User', function ($faker) {
    return [
        'name'        => $faker->word,
        'description' => $faker->sentence()
    ];
});
