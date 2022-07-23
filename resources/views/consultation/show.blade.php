@extends('layouts.main')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/consultation.css') }}">

@section('title', 'Consultation')

@section('content')
    <section class="hero">
        <div class="container z-999">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out" class="z-6">
                        <h4 class="fw-bold text-light">{{ $psychologist->name }}</h4>

                        <small class="s-font" style="color: rgb(201, 201, 201);">{{ $psychologist->hospital->name }}
                            <i class="bi bi-dot"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            {{ $psychologist->rating }}</small>

                        <p class="s-font text-light mt-3">{{ $psychologist->description }}</p>

                        <span class="badge bg-light text-dark rounded-pill m-font">
                            <span class="border-end border-dark border-2 pe-2">Rp</span>
                            {{ number_format($psychologist->fee, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img class="img-fluid " alt=""
                        src="{{ asset('storage/images/psychologists/' . $psychologist->image) }}"
                        style="width: 90%; height: 250px">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>
    </section>

    <div class="container my-3">


        <div class="row mb-4">
            @if (request('date'))
                {{-- Choose Hours --}}
                <h5>@lang('show_consultation.consultation_for')<b>{{ $date->format('l, d F Y') }}</b></h5>

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
                        <label for="hours" class="form-label fw-bolder">@lang('show_consultation.choose_hours')</label>
                        <div class="row">
                            @foreach ($schedules as $schedule)
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        {{ $schedule->status }}
                                        <input type="radio" class="btn-check btn-green" name="schedule"
                                            value="{{ $schedule->id }}" id="{{ $schedule->id }}"
                                            {{ $schedule->status != 'Open' || $schedule->isActive == false ? 'disabled' : '' }}
                                            {{ old('schedule') == $schedule->id ? 'checked' : '' }}>
                                        <label
                                            class="btn {{ $schedule->status != 'Open' ||
                                            $schedule->isActive == false ||
                                            ($date->toDateString() == \Carbon\Carbon::today('Asia/Bangkok')->toDateString() &&
                                                \Carbon\Carbon::createFromFormat(
                                                    'H:i:s',
                                                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $schedule->startTime)->format('H:i:s'),
                                                )->lte(\Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::now('Asia/Bangkok')->format('H:i:s'))))
                                                ? 'btn-secondary'
                                                : 'btn-outline-primary' }}"
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
                        <label for="price" class="form-label">@lang('show_consultation.total_price')</label>
                        <h5 class="card-title fw-bold">Rp. {{ number_format($psychologist->fee, 0, ',', '.') }}</h5>
                    </div>


                    <div class="mb-3">
                        <label for="payment_type" class="form-label">@lang('show_consultation.choose_your_payment_type')</label>
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

                    <button type="submit" class="btn btn-primary" name="submit"
                        value="online-consultation">@lang('show_consultation.chat_now')</button>
                    <button type="submit" class="btn btn-primary" name="submit"
                        value="offline-consultation">@lang('show_consultation.book_appoinment')</button>
                </form>
            @else
                {{-- CHOOSE DAY --}}
                <label for="schedule" class="form-label fw-bold l-font">@lang('show_consultation.choose_a_day')</label>
                <div class="mb-2 col-md-2">
                    <a
                        href="{{ route('psychologist_detail', ['psychologist' => $psychologist->id, 'date' => $today->toDateString()]) }}">
                        <div class="card consultation-card p-2">
                            <div class="d-flex flex-column justify-content-center text-center">
                                <div class="month"><span class="l-font fw-bolder">{{ $today->format('F') }}</span></div>
                                <div class="day"><span class="fs-2 fw-bolder">{{ $today->format('d') }}</span></div>
                                <div class="date"><span class="fw-bolder">{{ $today->format('l') }}</span></div>
                            </div>
                        </div>
                    </a>
                </div>

                @for ($i = 0; $i < 6; $i++)
                    <div class="mb-2 col-md-2">
                        <a
                            href="{{ route('psychologist_detail', ['psychologist' => $psychologist->id, 'date' => $today->addDays(1)->toDateString()]) }}">
                            <div class="card consultation-card p-2">
                                <div class="d-flex flex-column justify-content-center text-center">
                                    <div class="month"><span class="l-font fw-bolder">{{ $today->format('F') }}</span>
                                    </div>
                                    <div class="day"><span class="fs-2 fw-bolder">{{ $today->format('d') }}</span>
                                    </div>
                                    <div class="date"><span class="fw-bolder">{{ $today->format('l') }}</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            @endif
        </div>

        <div class="row about-hospital mb-4">
            <div class="border-bottom border-1 border-dark">
                <a class="link-dark" data-bs-toggle="collapse" href="#hospitalDescription" role="button"
                    aria-expanded="false" aria-controls="hospitalDescription">
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">About Hospital</span>
                        <i class="bi bi-caret-down fw-bold"></i>
                    </div>
                </a>
            </div>
            <div class="collapse" id="hospitalDescription">
                <div class="card-body">
                    <h5 class="fw-bold l-font">{{ $psychologist->hospital->name }}</h5>

                    <div class="d-flex">
                        <div class="col-md-5 me-3">
                            <img src="{{ asset('storage/images/hospitals/' . $psychologist->hospital->image) }}"
                                alt="" style="width: 100%;height: 250px;">
                        </div>
                        <div class="col-md-7 s-font text-justify pe-5 ps-3 my-auto">
                            <span class="s-font fw-bolder">Address: <br> {{ $psychologist->hospital->address }}</span>
                            <br><br>
                            <span class="s-font fw-bolder">Contact: <br> {{ $psychologist->hospital->contact }}</span>

                        </div>
                    </div>
                    <div class="text-secondary mt-3 s-font text-justify">{!! $psychologist->hospital->description !!}</div>
                </div>
            </div>
        </div>

        <div class="row doctor-review"></div>
    </div>
@endsection
