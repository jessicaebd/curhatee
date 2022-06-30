@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Choose your Psychologist</h2>
        <div class="row">
            @foreach ($psychologists as $psychologist)
                <div class="col-md-3">
                    <a href="/consultation/psychologists/{{ $psychologist->id }}" class="text-decoration-none text-dark">
                        <div class="card" style="width: 18rem;">

                            {{-- <img src="https://source.unsplash.com/random/720x480/?doctor" class="card-img-top"> --}}
                            <img src="{{ asset('storage/psychologists/' . $psychologist->image) }}" class="card-img-top">

                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $psychologist->name }}</h5>

                                <p class="card-title text-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $psychologist->rating)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @else
                                            <i class="bi bi-star text-warning"></i>
                                        @endif
                                    @endfor
                                </p>
                                <p class="card-title text-center">Rp. 50.000</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    @endsection
