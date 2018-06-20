@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center pb-1 m-5 form-title"><span>Modifier mon profile</span></div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="name">Nom :</label>
                                <div>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name',$user->name) }}" required autofocus>
                                   @if ($errors->has('name'))
                                     <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                     </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="gender">Genre :</label>
                                <div>
                                    <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' :'' }}" name="gender" required autofocus>
                                        <option value="1" {{$user->gender==1?'selected':''}} >Male</option>
                                        <option value="0" {{$user->gender==0?'selected':''}} >Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="country">Pays :</label>

                                <div>
                                    <select id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" required autofocus>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}" {{$user->profile->country==$country->name?'selected':''}}  >{{$country->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="company">Entreprise :</label>
                                <div>
                                    <input id="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company',$user->profile->company) }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="job_title">Profession :</label>
                                <div>
                                    <input id="job_title" type="text" class="form-control{{ $errors->has('job_title') ? ' is-invalid' : '' }}" name="job_title" value="{{ old('profession',$user->profile->job_title) }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="phone_number">Contacts :</label>
                                <div>
                                    <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number"  value="{{ old('phone_number',$user->profile->phone_number) }}" autofocus>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="birth_date">Date de naissance :</label>
                                <div>
                                    <input id="birth_date" type="text" class="datepicker form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date"  value="{{ old('birth_date',$user->profile->birth_date) }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Habite à :</label>
                                <div>
                                    <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location"  value="{{ old('location',$user->profile->location) }}" required autofocus>
                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback">
                                                <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="twitter">Twitter :</label>
                                <div>
                                    <input id="twitter" type="text" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ old('twitter',$user->profile->twitter) }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facebook">Facebook :</label>
                                <div>
                                    <input id="facebook" type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ old('facebook',$user->profile->facebook) }}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="linked_in">LindedIn :</label>
                                <div>
                                    <input id="linked_in" type="text" class="form-control{{ $errors->has('linked_in') ? ' is-invalid' : '' }}" name="linked_in" value="{{ old('linked_in',$user->profile->linked_in) }}"  autofocus>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="avatar">Avatar :</label>
                                <div>
                                    <input id="avatar" type="file" class="form-control" name="avatar" autofocus>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                    <label for="profile_image">Image de profile :</label>
                                    <div>
                                        <input id="profile_image" type="file" class="form-control" name="profile_image" autofocus>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="about">Me decrire :</label>
                                <div>
                                    <textarea id="about" rows="3" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" name="about" autofocus>{{ old('about',$user->profile->about) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="">
                                <button type="submit" class="btn btn-outline-success px-4">
                                    <i class="fa fa-save mr-2"  aria-hidden="true"></i>Valider
                                </button>
                                <a class="btn btn-outline-warning px-4 ml-3" href="{{ route('profile.show', $user) }}"> <i class="fa fa-chevron-circle-left mr-2" aria-hidden="true"></i>Retour</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('extra-js')
<script>
        $( function() {
          $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
          });
        } );
 </script>
@endpush
