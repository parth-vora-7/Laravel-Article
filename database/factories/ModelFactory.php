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
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
//        'user_id' => $faker->numberBetween(1, 6),
        'text' => $faker->text(1000),
        'slug' => App\Article::createSlug($title),
        'published_at' => $faker->date,
    ];
});
$factory->define(App\Tag::class, function(Faker\Generator $faker) {
    return 
    [
        'name' => $faker->word
    ];
});
