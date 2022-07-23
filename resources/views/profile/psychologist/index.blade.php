@extends('layouts.main-psychologist')

@section('title', 'Profile Psychologists')

@section('content')

    <div class="d-flex justify-content-end">
        <a href="{{ route('psychologist_edit_psychologist', $psychologist->id) }}"
            class="btn btn-outline-primary me-1 flex-grow-1">
            <i class="bi bi-pencil-square me-2"></i> Edit
        </a>
    </div>

@endsection
