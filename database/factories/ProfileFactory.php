<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'location'=>$faker->city,
        'about'=>$faker->text(),
        'phone_number'=>$faker->tollfreePhoneNumber(),
        'company'=>$faker->company(),
        'job_title'=>$faker->jobTitle(),
        'birth_date'=>$faker->dateTimeBetween($startDate='-80 years',$endDate='-18 years',$timezome=null),
        'profile_image'=>'public/avatars/female.png',
        'country'=>$faker->country()
    ];
});
