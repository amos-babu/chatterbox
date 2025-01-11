@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-6">
                <h4 class="card-header text-md-center mb-3"><strong>{{ __('Register') }}</strong></h4>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="name" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="name">{{ __('Name') }}</label>
                        </div>


                        <div class="form-floating mb-3">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="username"  autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="username">{{ __('Username') }}</label>
                        </div>

                        <div class="form-floating mb-3">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="email" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 <label for="email">{{ __('Email') }}</label>
                        </div>

                        <div class="form-floating mb-3">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password">{{ __('Password') }}</label>
                        </div>

                        <div class="form-floating mb-3">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="password-confirm" autocomplete="new-password">
                                <label for="password">{{ __('Confirm Password') }}</label>
                            </div>
                        </div>

                        <div class="mb-0">
                                <button type="submit" class="btn btn-primary">
                                    <strong>{{ __('Submit') }}</strong>
                                </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
