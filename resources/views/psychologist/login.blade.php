@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-center  px-1 pt-5 mt-5">
        <h4 class="fw-bolder py-4" id="loginModalLabel">{{ __('Login As Psychologist') }}</h4>
    </div>

    <div class="modal-body d-flex justify-content-center mt-2">
        <form method="POST" action="{{ route('psychologist_login') }}">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 mb-2">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Email Address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-10 mb-2">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-10 mb-2">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="text-primary" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-md-10 mb-2 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary px-4">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <a class="btn btn-link text-dark" href="{{ route('home') }}">
            {{ __('or Login as a User') }}
        </a>
    </div>
@endsection
