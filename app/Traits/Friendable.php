<?php

namespace App\Traits;

use App\User;
use App\Friendship;

trait Friendable{

    public function add_friend (User $requested){

        if($this->id==$requested->id){
            return 0;
        }

        if($this->is_friend_with($requested)==1){
            return 'Allready Friend';
        }

        //
        if($this->has_pending_friend_request_to($requested)==1){
            return 'Allready send a request';
        }

        if($this->has_pending_friend_request_from($requested)==1){
            return $this->accept_friend($requested);
        }

        $friendship=Friendship::Create([
            'requester_id'=>$this->id,
            'requested_id'=>$requested->id
            ]);

        return 1;

    }

    public function accept_friend (User $requester){

        if($this->has_pending_friend_request_from($requester)==0){
            return 0;
        }

        Friendship::where('requester_id',$requester->id)
                  ->where('requested_id',$this->id)
                  ->update(['status'=>1]);

        return 1;
    }

    public function decline_friend (User $user){

        if($this->is_friend_with($user)==0){
            return 0;
        }

        Friendship::where(function($query) use ($user){
                        $query->where('requested_id',$this->id)
                              ->where('requester_id',$user->id);
                         })
                  ->orWhere(function($query) use ($user){
                        $query->where('requester_id',$this->id)
                              ->where('requested_id',$user->id);
                        })
                  ->update(['status'=>0]);

        // Friendship::whereRaw("(requested_id=$this->id AND requester_id=$user->id) OR
        //                       (requester_id=$this->id AND requested_id=$user->id)")
        //           ->where('status',1)
        //           ->update(['status'=>0]);

        return 1;
    }

    public function cancel_request (User $requested){

         if($this->has_pending_friend_request_to($requested)==0){
             return 0;
         }

          Friendship::where('requester_id',$this->id)
                    ->where('requested_id',$requested->id)
                    ->delete();
          return 1;
    }


    public function friends (){

        $friends=array();
        $friends_requested=Friendship::where('status',1)
                                     ->where('requester_id',$this->id)
                                     ->get();

        $friends_requesters=Friendship::where('status',1)
                                      ->where('requested_id',$this->id)
                                      ->get();

        foreach ($friends_requested as $friend) {
            array_push($friends,$friend->requested);
        }

        foreach ($friends_requesters as $friend) {
            array_push($friends,$friend->requester);
        }


        return $friends;
    }


    public function pending_friends_requesters (){

        $pending_friends_requesters=array();

        $friends_requesters=Friendship::where('status',0)
                              ->where('requested_id',$this->id)
                              ->get();

        foreach ($friends_requesters as $requester) {
            array_push($pending_friends_requesters,$requester->requester);
        }
        return $pending_friends_requesters;
    }


    public function pending_friends_requested (){

        $pending_friends_requested=array();

        $friends_requested=Friendship::where('status',0)
                             ->where('requester_id',$this->id)
                             ->get();

        foreach ($friends_requested as $requested) {
            array_push($pending_friends_requested,$requested->requested);
        }

        return $pending_friends_requested;
    }


    public function is_friend_with (User $user){


        $friend=collect($this->friends())->first(function ($friend, $key) use($user) {
              return $friend->id==$user->id;
        });

        return $friend ? 1 : 0;

    }


    public function has_pending_friend_request_from (User $user){

        $friend=collect($this->pending_friends_requesters())->first(function ($friend, $key) use($user) {
            return $friend->id==$user->id;
        });

        return $friend ? 1 : 0;
    }

    public function has_pending_friend_request_to (User $user){

        $friend=collect($this->pending_friends_requested())->first(function ($friend, $key) use($user) {
            return $friend->id==$user->id;
        });

        return $friend ? 1 : 0;

    }

    public function check_status_with(User $user)
    {
        if ($this->is_friend_with($user)==1)
        {
            return ['status'=>'Friend'];
        }elseif ($this->has_pending_friend_request_from($user)==1) {
            return ['status'=>'Pending_From'];
        }elseif ($this->has_pending_friend_request_to($user)==1) {
            return ['status'=>'Pending_To'];
        }else{
            return ['status'=>0];
        }

    }
}
