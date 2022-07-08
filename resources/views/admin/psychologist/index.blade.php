@extends('layouts.main-admin')

@section('title', 'Manage Psychologists')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h3 class=" fw-bold">Psychologists</h3>
            <a href="{{ route('add_psychologist') }}" class="btn btn-primary my-auto">
                <i class="bi bi-plus-circle me-2"></i>Register Psychologist
            </a>
        </div>

        <div class="row">
            @foreach ($psychologists as $psychologist)
                <div class="col-12 col-md-6 mb-4">
                    <div class="card psychologist-card" style="border-radius: 15px; height: 15rem;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="{{ file_exists(public_path() . "/storage/psychologists/$psychologist->image") ? asset("/storage/psychologists/$psychologist->image") : asset('/storage/psychologists/default-psychologist.jpg') }}"
                                        alt="profile" class="img-fluid"
                                        style="width: 10rem; height:10rem; border-radius: 10px;">
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1 m-font fw-bolder">{{ $psychologist->name }}</h5>

                                    <p class="mb-2 pb-1 xs-font text-muted" style="color: #2b2a2a;">
                                        {{ $psychologist->hospital->name }}</p>

                                    <div class="d-flex justify-content-between rounded-3 p-2 mb-2"
                                        style="background-color: #efefef;">
                                        <div class="ps-2">
                                            <p class="small text-center text-muted mb-1">Transaction</p>
                                            <p class="mb-0 text-center">
                                                {{ $psychologist->schedule->count() }}
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <p class="small text-center text-muted mb-1">Fee</p>
                                            <p class="mb-0 text-center">IDR {{ $psychologist->fee }}</p>
                                        </div>
                                        <div class="pe-2">
                                            <p class="small text-center text-muted mb-1">Rating</p>
                                            <p class="mb-0 text-center">{{ $psychologist->rating }}</p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('edit_psychologist', $psychologist->id) }}"
                                            class="btn btn-outline-primary me-1 flex-grow-1">
                                            <i class="bi bi-pencil-square me-2"></i> Edit
                                        </a>

                                        <form action="{{ route('delete_psychologist', $psychologist->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger flex-grow-1">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
