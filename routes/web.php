<?php

use App\User;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profiles/edit',   'ProfileController@edit')->name('ProfileController@edit');
Route::put('/profiles/update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::get('/profiles/show/{user}', ['as' => 'profile.show', 'uses' => 'ProfileController@show']);

/* Route::get('/test', function(){

    $user1=User::find(1);
    $user2=User::find(2);
    $user3=User::find(3);
    return $user1->add_friend($user2);
});
Route::get('/test1', function(){

    $user1=User::find(1);
    $user2=User::find(2);
    $user3=User::find(3);
    return $user1->friends();
});

Route::get('/test2', function(){

    $user1=User::find(1);
    $user2=User::find(2);
    $user3=User::find(3);
    return $user2->accept_friend($user1);
});

Route::get('/test3', function(){

    $user1=User::find(1);
    $user2=User::find(2);
    $user3=User::find(3);
    return $user1->is_friend_with($user2);
});

Route::get('/test4', function(){

    $user1=User::find(1);
    $user2=User::find(2);
    $user3=User::find(3);
    return $user1->decline_friend($user2);
});

Route::get('/test5', function(){

    $user1=User::find(1);
    $user2=User::find(2);
    $user3=User::find(3);
    return $user2->has_pending_friend_request_from($user1);
});
 */
