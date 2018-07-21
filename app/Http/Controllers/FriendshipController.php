<?php

namespace App\Http\Controllers;

use App\User;
use App\Friendship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{

    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public function accept_friend(User $user)
    {
        return Auth::user()->accept_friend($user);
    }

    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public function refuse_friend(User $user)
    {
        return Auth::user()->refuse_friend($user);
    }

    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public function add_friend(User $user)
    {
       return Auth::user()->add_friend($user);
    }

  /**
   * Undocumented function
   *
   * @param User $user
   * @return void
   */
    public function decline_friend(User $user)
    {
        return Auth::user()->decline_friend($user);
    }


    public function cancel_request(User $user)
    {
       return Auth::user()->cancel_request($user);
    }

   /**
    *
    */

    public function friends()
    {
       return Auth::user()->friends();
    }
}
