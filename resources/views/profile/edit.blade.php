@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">Edit user profile</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('profile.update', $user_id) }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ old('user_id', $user_id) }}"/>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $user->dob) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" class="form-control" name="gender" value="{{ old('gender', $user->gender) }}">
                          <option value="" disabled selected></option>
                          <option value="female">Female</option>
                          <option value="male">Male</option>
                          <option value="other">Other</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" class="form-control" name="country" value="{{ old('country', $user->country) }}">
                          <option value="" disabled selected></option>
                          <option value="AL">Albania</option>
                          <option value="AD">Andorra</option>
                          <option value="AT">Austria</option>
                          <option value="BY">Belarus</option>
                          <option value="BE">Belgium</option>
                          <option value="BA">Bosnia and Herzegovina</option>
                          <option value="BG">Bulgaria</option>
                          <option value="HR">Croatia (Hrvatska)</option>
                          <option value="CY">Cyprus</option>
                          <option value="CZ">Czech Republic</option>
                          <option value="FR">France</option>
                          <option value="GI">Gibraltar</option>
                          <option value="DE">Germany</option>
                          <option value="GR">Greece</option>
                          <option value="VA">Holy See (Vatican City State)</option>
                          <option value="HU">Hungary</option>
                          <option value="IT">Italy</option>
                          <option value="LI">Liechtenstein</option>
                          <option value="LU">Luxembourg</option>
                          <option value="MK">Macedonia</option>
                          <option value="MT">Malta</option>
                          <option value="MD">Moldova</option>
                          <option value="MC">Monaco</option>
                          <option value="ME">Montenegro</option>
                          <option value="NL">Netherlands</option>
                          <option value="PL">Poland</option>
                          <option value="PT">Portugal</option>
                          <option value="RO">Romania</option>
                          <option value="SM">San Marino</option>
                          <option value="RS">Serbia</option>
                          <option value="SK">Slovakia</option>
                          <option value="SI">Slovenia</option>
                          <option value="ES">Spain</option>
                          <option value="UA">Ukraine</option>
                          <option value="GB">United Kingdom</option>
                          <option value="DK">Denmark</option>
                          <option value="EE">Estonia</option>
                          <option value="FO">Faroe Islands</option>
                          <option value="FI">Finland</option>
                          <option value="GL">Greenland</option>
                          <option value="IS">Iceland</option>
                          <option value="IE">Ireland</option>
                          <option value="LV">Latvia</option>
                          <option value="LT">Lithuania</option>
                          <option value="NO">Norway</option>
                          <option value="SJ">Svalbard and Jan Mayen Islands</option>
                          <option value="SE">Sweden</option>
                          <option value="CH">Switzerland</option>
                          <option value="TR">Turkey</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="height">Height</label>
                        <input type="text" class="form-control" id="height" name="height" value="{{ old('height', $user->height) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="start_weight">Start weight</label>
                        <input type="text" class="form-control" id="start_weight" name="start_weight" value="{{ old('start_weight', $user->start_weight) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="goal_weight">Goal weight</label>
                        <input type="text" class="form-control" id="goal_weight" name="goal_weight" value="{{ old('goal_weight', $user->goal_weight) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="activity_level">Activity level</label>
                        <select id="activity_level" class="form-control" name="activity_level" value="{{ old('activity_level') }}">
                          <option value="" disabled selected></option>
                          <option value="1.2">1.2 - desk job, no exercise</option>
                          <option value="1.4">1.4 - light exercise 1-3 days/week</option>
                          <option value="1.6">1.6 - moderate exercise 6-7 days/week</option>
                          <option value="1.8">1.8 - intense exercise every day</option>
                          <option value="2.0">2.0 - hard exercise 2 or more times/day</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="profile_info">Profile info</label>
                        <textarea id="profile_info" rows="4" cols="50" class="form-control" name="profile_info" value="{{ old('profile_info', $user->profile_info) }}">
                        </textarea>
                      </div>
                      <a href="{{ route('profile.index') }}" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
