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
    @lang('profile.join at') {{ $psychologist->created_at }}
    <br>
    {{ $psychologist->rating }}
    <br>
    {{ $psychologist->description }}
    <br>
    ===========
    <br>
    @lang('profile.total schedule in a week') {{ $psychologist->schedule->count() }}
    <br>
    @lang('profile.total transaction') {{ $psychologist->transaction->count() }}
    <br>
    @lang('profile.total online consultation')
    {{ $psychologist->transaction->where('consultation_type_id', $online_consultation_id)->count() }}
    <br>
    @lang('profile.total offline consultation')
    {{ $psychologist->transaction->where('consultation_type_id', $offline_consultation_id)->count() }}
    <br>
    @lang('profile.total transaction pending') {{ $psychologist->transaction->where('status', 'Pending')->count() }}
    <br>
    @lang('profile.total transaction confirmed') {{ $psychologist->transaction->where('status', 'Confirmed')->count() }}
    <br>
    @lang('profile.total transaction success') {{ $psychologist->transaction->where('status', 'Finished')->count() }}
    <br>
    @lang('profile.total transaction rejected') {{ $psychologist->transaction->where('status', 'Rejected')->count() }}
    <br>
    @lang('profile.total review') {{ $psychologist->review->count() }}
    <br>
    {{ $psychologist->rating }}
    <br>
    @lang('profile.total revenue') {{ $psychologist->transaction->where('status', '!=', 'Rejected')->sum('price') }}



    <div class="d-flex justify-content-end">
        <a href="{{ route('psychologist_edit_psychologist', $psychologist->id) }}"
            class="btn btn-outline-primary me-1 flex-grow-1">
            <i class="bi bi-pencil-square me-2"></i> @lang('profile.Edit')
        </a>
    </div>

@endsection
