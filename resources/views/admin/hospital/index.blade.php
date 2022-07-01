@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h3 class=" fw-bold">Hospitals</h3>
            <a href="{{ route('add_psychologist') }}" class="btn btn-primary my-auto">
                <i class="bi bi-plus-circle me-2"></i>Register Hospital
            </a>
        </div>

        <div class="row">
            @foreach ($hospitals as $hospital)
                <div class="col col-md-4 mb-4">
                    <div class="card" style="height: 15rem;">
                        <img src="{{ asset('storage/hospitals/' . $hospital->image) }}" alt="hospital"
                            class="card-img-top" style="height: 100%;">

                        <div class="card-body">
                            <h5 class="card-title l-font fw-bolder">{{ $hospital->name }}</h5>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('edit_hospital', $hospital->id) }}"
                                    class="btn btn-primary me-1 flex-grow-1">
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
