<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable=[
        'location','about','user_id','phone_number','company','job_title','profile_image'
    ];

    public function user(){
         return $this->belongsTo('App\User');
    }

}
