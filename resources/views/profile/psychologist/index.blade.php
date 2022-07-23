@extends('layouts.main-psychologist')

@section('title', 'Profile Psychologists')

@section('content')


    {{ $psychologist->name }}
    <br>
    {{ $psychologist->email }}
    <br>
    {{ $psychologist->phone }}
    <br>
    {{ $psychologist->hospital->name }}
    <br>
    {{ $psychologist->fee }}
    <br>
    {{ $psychologist->image }}
    <br>
    join at: {{ $psychologist->created_at }}
    <br>
    {{ $psychologist->rating }}
    <br>
    {{ $psychologist->description }}
    <br>
    ===========
    <br>
    total schedule in a week {{ $psychologist->schedule->count() }}
    <br>
    total transaction {{ $psychologist->transaction->count() }}
    <br>
    total online consultation
    {{ $psychologist->transaction->where('consultation_type_id', $online_consultation_id)->count() }}
    <br>
    total offline consultation
    {{ $psychologist->transaction->where('consultation_type_id', $offline_consultation_id)->count() }}
    <br>
    total transaction pending {{ $psychologist->transaction->where('status', 'Pending')->count() }}
    <br>
    total transaction confirmed {{ $psychologist->transaction->where('status', 'Confirmed')->count() }}
    <br>
    total transaction success {{ $psychologist->transaction->where('status', 'Finished')->count() }}
    <br>
    total transaction rejected {{ $psychologist->transaction->where('status', 'Rejected')->count() }}
    <br>
    total review {{ $psychologist->review->count() }}
    <br>
    {{ $psychologist->rating }}
    <br>
    total revenue {{ $psychologist->transaction->where('status', 'Finished')->sum('price') }}



    <div class="d-flex justify-content-end">
        <a href="{{ route('psychologist_edit_psychologist', $psychologist->id) }}"
            class="btn btn-outline-primary me-1 flex-grow-1">
            <i class="bi bi-pencil-square me-2"></i> Edit
        </a>
    </div>

@endsection
