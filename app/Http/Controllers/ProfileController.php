<?php

namespace App\Http\Controllers;

use App\User;
use Countries;
use App\Country;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{



    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user=Auth::user();
        $countries=Country::all();
        return view('profiles.edit',compact('user','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // Storage::delete('public/avatars/VX9FjXjnKvFXh47RJxvALlAs2lST4YqVSH8yxe3U.png');
        // dd('yes');
        Auth::user()->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
        ]);

        if($request->hasFile('avatar')){

            /* Si ce n'est pas une image par defaut */
            if(! strpos(Auth::user()->avatar,'male')){
                 $tabs=explode("/",Auth::user()->avatar);    /* Spliter l'Url de l'image et prendre le dernier comme nom */
                 Storage::delete("public/avatars/". end($tabs)); /* supprimer l'image */
            }

            Auth::user()->update([
                'avatar'=> $request->avatar->store('public/avatars')
            ]);
        }

        Auth::user()->profile()->update([
                'country'=>$request->country,
                'phone_number'=>$request->phone_number,
                'company'=>$request->company,
                'job_title'=>$request->job_title,
                'birth_date'=>$request->birth_date,
                'location'=>$request->location,
                'facebook'=>$request->facebook,
                'linked_in'=>$request->linked_in,
                'twitter'=>$request->twitter,
                'about'=>$request->about,
        ]);


        if($request->hasFile('profile_image')){
            /* Si ce n'est pas une image par defaut */
            if(! strpos(Auth::user()->profile->profile_image,'male')){
                 $tabs=explode("/",Auth::user()->profile->profile_image);    /* Spliter l'Url de l'image et prendre le dernier comme nom */
                 Storage::delete("public/avatars/". end($tabs)); /* supprimer l'image */
            }

            Auth::user()->profile->update([
                'profile_image'=> $request->profile_image->store('public/avatars')
            ]);
        }

        return redirect()->route('profile.show',Auth::user());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }

    public function chech_status_with(User $user)
    {
        return Auth::user()->check_status_with($user);
    }
}
