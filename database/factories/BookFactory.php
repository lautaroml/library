<?php

/** @var Factory $factory */

use App\Author;
use App\Book;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title'     => $faker->sentence,
        'author_id' => factory(Author::class)
    ];
});
