@extends('layouts.app')
@section('content')

<div class="row">
  <div class="profile-card col-md-6 offset-md-3 px-0">
    <img src="{{$user->profile->profile_image}}" alt="John" style="width:100%">
    <a class="profile-link" href="{{$user->profile->twitter}}"><i class="fa fa-twitter "></i></a>
    <a class="profile-link" href="{{$user->profile->linked_in}}"><i class="fa fa-linkedin"></i></a>
    <a class="profile-link" href="{{$user->profile->facebook}}"><i class="fa fa-facebook"></i></a>
  </div>
</div>
<div class="row">
  <div class="profile-details col-md-6 offset-md-3 px-0">
      <p class="profile-title text-center text-capitalize"><i class="fa fa-user mr-2" aria-hidden="true"></i>{{$user->name}}</p>
      <p class="profile-item"><i class="fa fa-home mr-2" aria-hidden="true"></i><span class="profile-item-label mr-2">Vit à :</span> {{$user->profile->location}}</p>
      <p class="profile-item"><i class="fa fa-hand-o-up mr-2" aria-hidden="true"></i><span class="profile-item-label mr-2">Profession :</span>{{$user->profile->job_title}}</p>
      <p class="profile-item"><i class="fa fa-building-o mr-2" aria-hidden="true"></i> <span class="profile-item-label mr-2">Chez :</span>{{$user->profile->company}}</p>
      <p class="profile-item"><i class="fa fa-phone mr-2" aria-hidden="true"></i><span class="profile-item-label mr-2">Contact :</span>
        {{$user->profile->phone_number}}</p>
      <p class="profile-item border-bottom-0">{{$user->profile->about}}</p>
  </div>
</div>
<div class="row">
  <div class="col-md-6 offset-md-3 px-0 mt-4 text-center">
    <a class="btn btn-outline-dark" href="#">
        <i class="fa fa-pencil mr-2" aria-hidden="true"></i>Modifier mon profil
    </a>
  </div>
</div>
@endsection
