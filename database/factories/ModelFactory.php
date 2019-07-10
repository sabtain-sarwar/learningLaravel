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
// we have this factory object where we call the define method and that has a couple of arguments.This
// method takes the class and he takes a function that brings back this $faker object.This $faker object
// is a library that allow us to have basically it has a lot of functionality and that object has a lot of
// properties and methods that we can use to make our data a little bit more human.safeEmail is gonna grab
// emails out there, that are not real emails but it gonna look real,the name property is also gonna have
// a lot of real names that we can use as data
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'role_id'=> $faker->numberBetween(1,3),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1,10),
        'photo_id' => 1,
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraphs(rand(10,15), true),
        'slug'=> $faker->slug()
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['administrator', 'author', 'subscriber']),
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['PHP', 'Programming', 'JavaScript', 'Life', 'Travel','Coffee', 'Money', 'Women', 'Men', 'Love' ]),
    ];
});


$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'file'=> 'placeholder.jpg'
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id'=> $faker->numberBetween(1,10),
        'is_active'=> 1,
        'author'=> $faker->name,
        'photo'=> 'placeholder.jpg',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true),
    ];
});



$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        'is_active'=> 1,
        'author'=> $faker->name,
        'photo'=> 'placeholder.jpg',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true),
    ];
});