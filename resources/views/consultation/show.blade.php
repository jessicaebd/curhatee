@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center mb-3">Book a Psychologist</h3>

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
                {{-- CHOOSE DAY --}}
                @if (request('date'))

                    <h5>Consultation for <b>{{ $date->format('l, d F Y') }}</b></h5>

                    <form action="/consultation/psychologists/{{ $psychologist->id }}" method="post">
                        @csrf
                        <input type="hidden" name="date" value="{{ request('date') }}">
                        <input type="hidden" name="psychologist" value={{ $psychologist->id }}>

                        {{-- <div class="mb-3">
                            <label for="hours" class="form-label">Choose hours:</label>
                            <select class="form-select @error('schedule') is-invalid @enderror" name="schedule">
                                <option selected disabled>-</option>
                                @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->id }}"
                                        {{ old('schedule') == $schedule->id ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::parse($schedule->startTime)->format('H:i') }}
                                        -
                                        {{ \Carbon\Carbon::parse($schedule->endTime)->format('H:i') }}</option>
                                @endforeach
                            </select>
                            @error('schedule')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="mb-3">
                            <label for="hours" class="form-label">Choose hours:</label>
                            <div class="row">
                                @foreach ($schedules as $schedule)
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <input type="radio" class="btn-check" name="schedule"
                                                value="{{ $schedule->id }}" id="{{ $schedule->id }}"
                                                {{ $schedule->status == 'Booked' ? 'disabled' : '' }}
                                                {{ old('schedule') == $schedule->id ? 'checked' : '' }}>
                                            <label
                                                class="btn {{ $schedule->status == 'Booked' ? 'btn-secondary' : 'btn-outline-primary' }}"
                                                for="{{ $schedule->id }}">{{ \Carbon\Carbon::parse($schedule->startTime)->format('H:i') }}
                                                -
                                                {{ \Carbon\Carbon::parse($schedule->endTime)->format('H:i') }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('schedule')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- TOTAL PRICE --}}
                        <div class="mb-3">
                            <label for="price" class="form-label">Total price:</label>
                            <h5 class="card-title fw-bold">Rp. {{ number_format($psychologist->fee, 0, ',', '.') }}</h5>
                        </div>


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
                @else
                    {{-- CHOOSE HOURS --}}
                    <label for="schedule" class="form-label">Choose a day:</label>

                    @for ($i = 0; $i < 7; $i++)
                        <div class="mb-2">
                            <a
                                href="{{ route('detail', ['psychologist' => $psychologist->id, 'date' => $today->addDays(1)->toDateString()]) }}">
                                <div class="card p-2">
                                    {{ $today->format('l, d F Y') }}
                                </div>
                            </a>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </div>

@endsection
