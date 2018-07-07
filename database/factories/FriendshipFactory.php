<?php

use Faker\Generator as Faker;
use App\Friendship;

$factory->define(App\Friendship::class, function (Faker $faker) {

    do {
        $user1_id=rand(1,10);
        $user2_id=rand(1,10);
        $status=rand(0,1);
    } while ($user1_id==$user2_id ||
          Friendship::where('requester_id',$user1_id)->where('requested_id',$user2_id)->first()!=null ||  Friendship::where('requester_id',$user2_id)->where('requested_id',$user1_id)->first()!=null
            );

    return [
        'requester_id'=>$user1_id,
        'requested_id'=>$user2_id,
        'status'=>$status

    ];
});
