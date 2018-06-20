<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{

    protected $dates = ['birth_date'];
    protected $fillable = [
        'location', 'about', 'user_id', 'phone_number', 'company', 'job_title', 'profile_image', 'facebook', 'linked_in', 'twitter', 'birth_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function getProfileImageAttribute($value)
    {
        return asset(Storage::Url($value));
    }
    public function getBirthdateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->toDateString();
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('Y-m-d', $value)->toDateString();
    }

}
