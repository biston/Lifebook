<?php

use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile/edit',   'ProfileController@edit')->name('profile.edit');
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');

Route::get('/test', function(){

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
