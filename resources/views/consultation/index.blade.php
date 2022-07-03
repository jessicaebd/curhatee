@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Choose your Psychologist</h2>
        <div class="row">
            @foreach ($psychologists as $psychologist)
                <div class="col-md-3">
                    <a href="/consultation/psychologists/{{ $psychologist->id }}" class="text-decoration-none text-dark">
                        <div class="card mb-5" style="width: 18rem;">

                            <img src="{{ asset('storage/psychologists/' . $psychologist->image) }}" class="card-img-top">

                            <div class="card-body">
                                <p class="card-title text-center fw-bold">{{ $psychologist->name }}</p>

                                <p class="card-title text-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $psychologist->rating)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @else
                                            <i class="bi bi-star text-warning"></i>
                                        @endif
                                    @endfor
                                </p>
                                <p class="card-title text-center">Rp. {{ number_format($psychologist->fee, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    @endsection
