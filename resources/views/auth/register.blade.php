@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-3 mb-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body mt-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">

                        <div class="col-md-6">
                        
                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label">{{ __('Surname') }}</label>

                                <div class="col-md-8">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label">{{ __('Firstname') }}</label>

                                <div class="col-md-8">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" autocomplete="firstname" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label">{{ __('Username') }}</label>

                                <div class="col-md-8">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="matric" class="col-md-4 col-form-label">{{ __('Matric Number') }}</label>

                                <div class="col-md-8">
                                    <input id="matric" type="text" class="form-control @error('matric') is-invalid @enderror" name="matric" value="{{ old('matric') }}" autocomplete="matric" autofocus>

                                    @error('matric')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="form-group row">
                                <label for="level" class="col-md-4 col-form-label">{{ __('Level') }}</label>

                                <div class="col-md-8">
                                    <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" autocomplete="level" autofocus>

                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="department" class="col-md-4 col-form-label">{{ __('Department') }}</label>

                                <div class="col-md-8">
                                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" autocomplete="department" autofocus>

                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label">{{ __('Phone Number') }}</label>

                                <div class="col-md-8">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                        </div>


                        <div class="form-group row col-md-12 justify-content-center">
                            <div class="col-md-3 mt-2">
                                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="{{ env('CAPTCHA_KEY') }}" style="transform:scale(0.8); transform-origin:0 0; -webkit-transform:scale(0.8); -webkit-transform-origin:0 0;"> </div>
                               
                                @error('g-recaptcha-response')
                                    <div class="invalid-feedback" role="alert" style="display:block;">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>


                    </div> {{-- row --}}

                        <div class="form-group row mb-3 text-center">
                            <div class="col-md-12 mt-3">
                                <button type="submit" id="subbtn" class="btn btn-primary" disabled>
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
