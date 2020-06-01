<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conversation;
use Faker\Generator as Faker;

$factory->define(Conversation::class, function (Faker $faker) {
    return [
        'sender_id' => 1,
        'receiver_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        }
    ];
});
