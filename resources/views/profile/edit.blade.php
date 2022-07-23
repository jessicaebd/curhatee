@extends('layouts.main')

@section('title', 'Edit Profile')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5 mt-5">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="fw-bolder">Edit Profile</h3>

                                <hr class="mb-4 pb-2 pb-md-0 mb-md-5" style="color: #2934d0;">

                                @if ($errors->any())
                                    <div class="alert
                                    alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('edit_profile', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            id="name" name="name" class="mb-0"
                                            value="{{ old('name') ? old('name') : $user->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                id="email" name="email"
                                                value="{{ old('email') ? old('email') : $user->email }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="tel"
                                                class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                                id="phone" name="phone"
                                                value="{{ old('phone') ? old('phone') : $user->phone }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password"
                                            class="form-control form-control-lg @error('confirm_password') is-invalid @enderror"
                                            id="confirm_password" name="confirm_password">
                                            @error('confirm_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text"
                                            class="form-control form-control-lg @error('address') is-invalid @enderror"
                                            id="address" name="address"
                                            value="{{ old('address') ? old('address') : $user->address }}">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label for="image">Profile Picture</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-5 pt-2">
                                        <input class="btn btn-primary btn-lg px-5" type="submit" value="Submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection
