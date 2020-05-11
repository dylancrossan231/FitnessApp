@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="emailemail" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Dob') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                              <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                                <option value="" disabled selected></option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="other">Other</option>
                              </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                              <select id="country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
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

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('height') }}</label>

                            <div class="col-md-6">
                                <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height" autofocus>

                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_weight" class="col-md-4 col-form-label text-md-right">{{ __('Start weight') }}</label>

                            <div class="col-md-6">
                                <input id="start_weight" type="text" class="form-control @error('start_weight') is-invalid @enderror" name="start_weight" value="{{ old('start_weight') }}" required autocomplete="start_weight" autofocus>

                                @error('start_weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goal_weight" class="col-md-4 col-form-label text-md-right">{{ __('Goal weight') }}</label>

                            <div class="col-md-6">
                                <input id="goal_weight" type="text" class="form-control @error('goal_weight') is-invalid @enderror" name="goal_weight" value="{{ old('goal_weight') }}" required autocomplete="goal_weight" autofocus>

                                @error('goal_weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activity_level" class="col-md-4 col-form-label text-md-right">{{ __('Activity level') }}</label>

                            <div class="col-md-6">
                              <select id="activity_level" class="form-control @error('activity_level') is-invalid @enderror" name="activity_level" value="{{ old('activity_level') }}" required autocomplete="activity_level" autofocus>
                                <option value="" disabled selected></option>
                                <option value="1.2">1.2 - desk job, no exercise</option>
                                <option value="1.4">1.4 - light exercise 1-3 days/week</option>
                                <option value="1.6">1.6 - moderate exercise 6-7 days/week</option>
                                <option value="1.8">1.8 - intense exercise every day</option>
                                <option value="2.0">2.0 - hard exercise 2 or more times/day</option>
                              </select>

                                @error('activity_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_info" class="col-md-4 col-form-label text-md-right">{{ __('Profile info') }}</label>

                            <div class="col-md-6">
                                <textarea id="profile_info" rows="4" cols="50" class="form-control @error('profile_info') is-invalid @enderror" name="profile_info" value="{{ old('profile_info') }}" required autocomplete="profile_info" autofocus placeholder="Describe your fitness journey, goals, etc.">
                                </textarea>
                                @error('profile_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
