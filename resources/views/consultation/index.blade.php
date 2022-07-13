@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container mt-3">
        <h2 class="text-center mb-4">Choose your Psychologist</h2>

        <div class="row">
            @foreach ($psychologists as $psychologist)
                <div class="col-12 col-md-6 mb-4">
                    <div class="card psychologist-card shadow-sm" style="border-radius: 15px; height: 10rem;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="{{ file_exists(public_path() . "/storage/psychologists/$psychologist->image") ? asset("/storage/psychologists/$psychologist->image") : asset('/storage/psychologists/default-psychologist.jpg') }}"
                                        alt="profile" class="img-fluid"
                                        style="width: 7rem; height:7rem; border-radius: 10px;">
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1 m-font fw-bolder">{{ $psychologist->name }}</h5>

                                    <p class="mb-2 pb-1 xs-font text-muted" style="color: #2b2a2a;">
                                        {{ $psychologist->hospital->name }}</p>

                                    <div class="rounded-3 p-2 mb-2">
                                        <div class="pe-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $psychologist->rating)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @else
                                                    <i class="bi bi-star text-warning"></i>
                                                @endif
                                            @endfor
                                        </div>

                                        <div class="px-2">
                                            <p class="mb-0 fw-bolder text-end">Rp.
                                                {{ number_format($psychologist->fee, 0, ',', '.') }}</p>
                                        </div>

                                        <div class="button">
                                            <a href="{{ route('chat_for_user', $psychologist->id) }}">
                                                <button type="button" class="btn btn-primary">Chat Online</button>
                                            </a>
                                            <a href="{{ route('psychologist_detail', $psychologist->id) }}">
                                                <button type="button" class="btn btn-info">Book Appointment</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
