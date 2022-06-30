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

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6">

                @if (request('date'))
                    <h5>{{ $date->format('l, d F Y') }}</h5>
                    <p>Choose hours:</p>

                    {{-- <div class="row">
                        @foreach ($schedules as $schedule)
                            <div class="mb-2 col-md-4">
                                <div class="card p-2 text-center">
                                    {{ \Carbon\Carbon::parse($schedule->startTime)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($schedule->endTime)->format('H:i') }}

                                </div>
                            </div>
                        @endforeach
                    </div> --}}



                    <form action="/consultation/psychologists{{ $psychologist->id }}/" method="post">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected disabled>-</option>
                                @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule }}">
                                        {{ \Carbon\Carbon::parse($schedule->startTime)->format('H:i') }}
                                        -
                                        {{ \Carbon\Carbon::parse($schedule->endTime)->format('H:i') }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="payment_type" class="form-label">Choose your payment type:</label>
                            <select class="form-select">
                                <option selected disabled>-</option>

                                @foreach ($payment_types as $payment_type)
                                    <option value="{{ $payment_type->type_name }}">{{ $payment_type->type_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                @else
                    <label for="schedule" class="form-label">Choose day:</label>

                    {{-- 6 hari setelahnya --}}
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
