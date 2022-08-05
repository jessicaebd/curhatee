<div class="d-flex justify-content-between  px-1">
    <div class=""></div>
    <h4 class="fw-bolder py-4" id="loginModalLabel">{{ __('Register') }}</h4>
    <button type="button" class="btn-close p-2" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body mt-2 d-flex justify-content-center">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mb-2">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                    placeholder="Name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-10 mb-2">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email"
                    placeholder="Email Address">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-10 mb-2">
                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                    name="phone" required placeholder="Phone">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-10 mb-2">
                <input type="file" class="form-control" id="image" name="image"
                    placeholder="Choose your profile image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-10 mb-2">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-10 mb-2">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirm Password">
            </div>

            <div class="col-md-10 mb-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary px-4">
                    {{ __('Register') }}
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
