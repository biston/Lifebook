<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['content','user_id','image','videos','sound','published'];

    public function user (){
         return $this->belongsTo(App\User::class);
    }


    public function likes (){
         return $this->hasMany(App\Like::class);
    }
}
