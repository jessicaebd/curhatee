@extends('layouts.main')

@section('title', 'Edit Profile')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5 mt-5">
            <div class="row">
                {{-- <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/images/users/' . $user->image) }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>

                            <div class="d-flex justify-content-center mb-2">
                                @if ($user->subscription_status == 'valid')
                                    <p class="text-muted mb-4">
                                        @lang('index_profile.expiry_date'){{ \Carbon\Carbon::parse($user->expiry_date)->format('d F Y') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> --}}

                <form action="{{ route('edit_profile', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <label for="name" class="mb-0 fs-4">Full Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" class="mb-0" value="{{ old('name') ? old('name') : $user->name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <label for="email" class="mb-0 fs-4">Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control form-control-lg" id="email"
                                                name="email"
                                                value="{{ old('email') ? old('email') : $user->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <label for="password" class="mb-0 fs-4">Password</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control form-control-lg" id="password"
                                                name="password">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <label for="password" class="mb-0 fs-4">Confirm Password</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control form-control-lg" id="password-confirm"
                                                name="password_confirmation">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <label for="phone" class="mb-0 fs-4">Phone</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control form-control-lg" id="phone"
                                                name="phone"
                                                value="{{ old('phone') ? old('phone') : $user->phone }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <label for="phone" class="mb-0 fs-4">Address</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-lg" id="address"
                                                name="address"
                                                value="{{ old('address') ? old('address') : $user->address }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <label for="image" class="mb-0 fs-4">Image</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3 mt-4">
                                        <input class="btn btn-primary btn-lg px-5" type="submit" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </section>
@endsection
