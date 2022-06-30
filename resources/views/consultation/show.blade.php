@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center mb-3">Psychologist Details</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                {{-- <img src="https://source.unsplash.com/random/720x480/?doctor" class="card-img-top"> --}}
                <img src="{{ asset('storage/psychologists/' . $psychologist->image) }}" class="card-img-top">

            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Dr. Bujang Marijuana</h5>
                    <h5 class="card-title">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $psychologist->rating)
                                <i class="bi bi-star-fill text-warning"></i>
                            @else
                                <i class="bi bi-star text-warning"></i>
                            @endif
                        @endfor
                    </h5>
                    <h5 class="card-title">Rp. 50.000</h5>
                </div>
            </div>
        </div>
    @endsection
