@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center mb-3">Psychologist Details</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <img src="{{ asset('storage/psychologists/' . $psychologist->image) }}" style="width: 350px; height: 250px">

            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">{{ $psychologist->name }}</h5>
                    <h5 class="card-title">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $psychologist->rating)
                                <i class="bi bi-star-fill text-warning"></i>
                            @else
                                <i class="bi bi-star text-warning"></i>
                            @endif
                        @endfor
                    </h5>
                    <p class="card-title">{{ $psychologist->description }}</p>
                </div>
            </div>
        </div>
    @endsection
