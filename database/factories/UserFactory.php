<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    static $number=1;
    return [
        'name' => 'user'.$number,
        'email' => 'user'.$number.'@mail.com',
        'slug'=>str_slug('user'.$number++),
        'gender'=>1,
        'avatar'=>'public/avatars/male.png',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
