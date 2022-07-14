@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center mb-3">Psychologist Details</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <img src="{{ asset('storage/images/psychologists/' . $psychologist->image) }}"
                    style="width: 350px; height: 250px">

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

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6">
                {{ $date }}
                <form action="/transaction">

                    {{-- <div class="mb-3">
                        <label for="schedule" class="form-label">Choose day:</label>
                        <a href="/consultation/psychologists/{{ $psychologist->id }}/">
                            <div class="card">
                                <div class="card-body">
                                    {{ $today->format('l, d F Y') }}
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="mb-3">
                        <label for="payment_type" class="form-label">Choose your payment type:</label>
                        <select class="form-select">
                            <option selected disabled>-</option>

                            @foreach ($payment_types as $payment_type)
                                <option value="{{ $payment_type->type_name }}">{{ $payment_type->type_name }}</option>
                            @endforeach
                        </select>
                    </div>


                </form>
            </div>
        </div>

    </div>

@endsection
