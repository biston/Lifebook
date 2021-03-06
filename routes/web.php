<?php

use App\User;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profiles/status/{user}', ['as' => 'profile.status', 'uses' => 'ProfileController@chech_status_with']);
    Route::get('/profiles/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('/profiles/update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::get('/profiles/show/{user}', ['as' => 'profile.show', 'uses' => 'ProfileController@show']);
    Route::get('/profiles', ['as' => 'profile.index', 'uses' => 'ProfileController@index']);

    // Friendship
    Route::get('/friendships', ['as' => 'friendship.all', 'uses' => 'FriendshipController@friends']);
    Route::post('/friendships/add/{user}', ['as' => 'friendship.add', 'uses' => 'FriendshipController@add_friend']);
    Route::delete('/friendships/refuse/{user}', ['as' => 'friendship.refuse', 'uses' => 'FriendshipController@refuse_friend']);
    Route::put('/friendships/accept/{user}', ['as' => 'friendship.accept', 'uses' => 'FriendshipController@accept_friend']);
    Route::delete('/friendships/decline/{user}', ['as' => 'friendship.decline', 'uses' => 'FriendshipController@decline_friend']);
    Route::delete('/friendships/cancel/{user}', ['as' => 'friendship.cancel', 'uses' => 'FriendshipController@cancel_request']);



});


//  Route::get('/test', function(){

//     $user1=User::find(1);
//     $user2=User::find(2);
//     $user3=User::find(3);
//     return $user1->add_friend($user2);
// });
// Route::get('/test1', function(){

//     $user1=User::find(1);
//     $user2=User::find(2);
//     $user3=User::find(3);
//     return $user1->friends();
// });

// Route::get('/test2', function(){

//     $user1=User::find(1);
//     $user2=User::find(2);
//     $user3=User::find(3);
//     return $user2->accept_friend($user1);
// });

// Route::get('/test3', function(){

//     $user1=User::find(1);
//     $user2=User::find(2);
//     $user3=User::find(3);
//     return $user1->is_friend_with($user2);
// });

// Route::get('/test4', function(){

//     $user1=User::find(1);
//     $user2=User::find(2);
//     $user3=User::find(3);
//     return $user1->decline_friend($user2);
// });

// Route::get('/test5', function(){

//     $user1=User::find(1);
//     $user2=User::find(2);
//     $user6=User::find(6);
//     return $user1->check_status_with($user6);
// });

