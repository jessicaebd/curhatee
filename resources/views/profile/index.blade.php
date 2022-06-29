@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container d-flex justify-content-center py-5 mt-5">
        <div class="card-profile">
            <div class="d-flex align-items-center "> <img src="{{ asset('storage/users/' . $user->image) }}"
                    class="img profile-image rounded-pill" alt="profile-picture" width="150" height="150">
                <div class="ms-5">
                    <h5 class="text-dark m-font fw-bold">Peter Parker <small
                            class="text-muted ms-2 fw-normal xs-font">Student</small>
                    </h5>
                    <p class="text-muted s-font">peterparker@zmail.com</p>
                    <button type="button" class="btn btn-custom btn-main px-3">Edit Profile</button>

                </div>


            </div>

            <div class="recent-border mt-4">
                <span class="recent-orders">Recent orders</span>
            </div>

            <div class="mt-2">
                <button type="button" class="btn btn-primary btn-main px-3">See All History</button>
            </div>
        </div>
    </div>

@endsection
