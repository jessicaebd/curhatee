@extends('layouts.main-admin')

@section('title', 'Manage User')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h3 class=" fw-bold">@lang('index_admin_psychologist.psychologists')</h3>
            <a href="{{ route('add_psychologist') }}" class="btn btn-primary my-auto">
                <i class="bi bi-plus-circle me-2"></i>@lang('index_admin_psychologist.register_psychologist')
            </a>
        </div>

        <div class="row">
            @foreach ($users as $user)
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
            @endforeach
        </div>
    @endsection
