<div class="d-flex justify-content-between  px-1">
    <div class=""></div>
    <h4 class="fw-bolder py-4" id="loginModalLabel">{{ __('Login') }}</h4>
    <button type="button" class="btn-close p-2" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body mt-2 d-flex justify-content-center">
    <form method="POST" action="{{ route('login') }}">
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
    <a class="btn btn-link text-dark" href="{{ route('psychologist_login') }}">
        {{ __('or Login as a Psychologist') }}
    </a>
</div>
