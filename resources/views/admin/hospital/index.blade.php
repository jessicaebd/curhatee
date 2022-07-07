@extends('layouts.main-admin')

@section('title', 'Manage Hospitals')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h3 class=" fw-bold">Hospitals</h3>
            <a href="{{ route('add_hospital') }}" class="btn btn-primary my-auto">
                <i class="bi bi-plus-circle me-2"></i>Register Hospital
            </a>
        </div>

        <div class="row">
            @foreach ($hospitals as $hospital)
                <div class="col col-md-4 mb-4">
                    <div class="card" style="height: 20rem;">
                        <img src="{{ asset('storage/images/hospitals/' . $hospital->image) }}" alt="hospital"
                            class="card-img-top" style="height: 12rem;">

                        <div class="card-body">
                            <h5 class="card-title l-font fw-bolder" style="height: 3rem;">{{ $hospital->name }}</h5>

                            <div class="d-flex justify-content-end align-items-end">
                                <a href="{{ route('edit_hospital', $hospital->id) }}"
                                    class="btn btn-outline-primary me-1 flex-grow-1">
                                    <i class="bi bi-pencil-square me-2"></i> Edit
                                </a>

                                <form action="{{ route('delete_hospital', $hospital->id) }}" method="POST">
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
            @endforeach
        </div>
    @endsection
