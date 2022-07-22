@extends('layouts.main-admin')

@section('title', 'Manage User Transactions')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- user profile --}}
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="card psychologist-card" style="border-radius: 15px; height: 15rem;">
                    <div class="card-body p-4">
                        <div class="d-flex text-black">
                            <div class="flex-shrink-0">
                                <img src="{{ file_exists(public_path() . "/storage/images/users/$user->image") ? asset("/storage/images/users/$user->image") : asset('/storage/users/user-profile.jpg') }}"
                                    alt="profile" class="img-fluid"
                                    style="width: 10rem; height:10rem; border-radius: 10px;">
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1 m-font fw-bolder">{{ $user->name }}</h5>

                                <h5 class="mb-1 m-font fw-bolder">{{ $user->email }}</h5>

                                <h5 class="mb-1 m-font fw-bolder">{{ $user->phone }}</h5>

                                <div class="d-flex justify-content-center rounded-3 p-2 mb-2"
                                    style="background-color: #efefef;">
                                    <div class="ps-2">
                                        <p class="small text-center text-muted mb-1">Total transaction</p>
                                        <p class="mb-0 text-center">
                                            {{ $user->transaction->count() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- user transactions --}}
            @foreach ($transactions as $transaction)
            @endforeach
        </div>
    @endsection
