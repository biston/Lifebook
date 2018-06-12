<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable=['requester_id','requested_id','status'];

    protected $appends=['requester','requested'];

    public function getRequesterAttribute(){
         return User::find($this->attributes['requester_id']);
    }

    public function getRequestedAttribute(){
         return User::find($this->attributes['requested_id']);
    }

}
