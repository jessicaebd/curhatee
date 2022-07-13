@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Book a Psychologist</h2>

        <div class="row d-flex justify-content-center">
            {{-- psychologist details --}}
            <div class="col-md-4">
                <img src="{{ asset('storage/psychologists/' . $psychologist->image) }}" style="width: 90%; height: 250px">

                <h5 class="card-title mt-3 fw-bold">{{ $psychologist->name }}</h5>
                <h5 class="card-title">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $psychologist->rating)
                            <i class="bi bi-star-fill text-warning"></i>
                        @else
                            <i class="bi bi-star text-warning"></i>
                        @endif
                    @endfor
                    </p>
                </h5>
                <p class="card-text text-justify">{{ $psychologist->description }}</p>
                <p class="card-title fw-bold">Working at</p>
                <a href="/hospitals/{{ $psychologist->hospital->id }}" class="card-link text-decoration-underline">
                    {{ $psychologist->hospital->name }}
                </a>
            </div>

            <div class="col-md-5">
                {{-- TOTAL PRICE --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Total price:</label>
                    <h5 class="card-title fw-bold">Rp. {{ number_format($psychologist->fee, 0, ',', '.') }}</h5>
                </div>
                <form action="/chat/psychologists/{{ $psychologist->id }}" method="post">
                    <div class="mb-3">

                        <label for="payment_type" class="form-label">Choose your payment type:</label>
                        <select class="form-select @error('payment_type') is-invalid @enderror" name="payment_type">
                            <option selected disabled>-</option>

                            @foreach ($payment_types as $payment_type)
                                <option value="{{ $payment_type->id }}"
                                    {{ old('payment_type') == $payment_type->id ? 'selected' : '' }}>
                                    {{ $payment_type->type_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('payment_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection
