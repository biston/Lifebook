<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{

    protected $fillable=[
     'location','about','user_id','phone_number','company','job_title','profile_image','facebook','linked_in','twitter'
    ];

    public function user(){
            return $this->belongsTo('App\User');
    }


    public function getProfileImageAttribute($profile_image){
        return asset(Storage::Url($profile_image));
    }

}
