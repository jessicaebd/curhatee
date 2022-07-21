@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">@lang('show_consultation.book_a_psychologist')</h2>

        <div class="row d-flex justify-content-center">
            {{-- psychologist details --}}
            <div class="col-md-4">
                <img src="{{ asset('storage/images/psychologists/' . $psychologist->image) }}"
                    style="width: 90%; height: 250px">

                <h5 class="card-title mt-3 fw-bold">{{ $psychologist->name }}</h5>
                <h5 class="card-title">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $psychologist->rating)
                            <i class="bi bi-star-fill text-warning"></i>
                        @else
                            <i class="bi bi-star text-warning"></i>
                        @endif
                    @endfor
                    {{-- sengaja tambah angka rating. karna rata" rating bisa koma --}}
                    {{ $psychologist->rating }}
                    </p>
                </h5>
                <p class="card-text text-justify">{{ $psychologist->description }}</p>
                <p class="card-title fw-bold">@lang('show_consultation.working_at')</p>
                <a href="/hospitals/{{ $psychologist->hospital->id }}" class="card-link text-decoration-underline">
                    {{ $psychologist->hospital->name }}
                </a>

                {{-- psychologist some reviews --}}
                <div class="user-header d-flex justify-content-between ">
                    @foreach ($reviews as $review)
                        <div class="d-flex align-items-center">
                            <div class="user-header-avatar">
                                <img src="{{ asset('storage/images/users/' . $review->user->image) }}" alt="user"
                                    class="img-fluid rounded rounded-circle me-2" width="30px" height="30px">
                            </div>
                            <h6 class="user-header-name fw-bolder">{{ $review->user->name }}</h6>
                        </div>
                        {{ $review->comment }}
                        <br>
                        {{ $review->created_at }}
                    @endforeach
                    <a href="">see more</a>
                    {{-- <a href="{{ route('pyschologist_review', $psychologist->id) }}">See more reviews</a> --}}
                </div>
            </div>


            <div class="col-md-5">
                {{-- CHOOSE HOURS --}}
                @if (request('date'))

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
                            <label for="hours" class="form-label">@lang('show_consultation.choose_hours')</label>
                            <div class="row">
                                @foreach ($schedules as $schedule)
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            {{ $schedule->status }}
                                            <input type="radio" class="btn-check" name="schedule"
                                                value="{{ $schedule->id }}" id="{{ $schedule->id }}"
                                                {{ $schedule->status != 'Open' ? 'disabled' : '' }}
                                                {{ old('schedule') == $schedule->id ? 'checked' : '' }}>
                                            <label
                                                class="btn {{ $schedule->status != 'Open' || ($date->toDateString() == \Carbon\Carbon::today('Asia/Bangkok')->toDateString() && \Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $schedule->startTime)->format('H:i:s'))->lte(\Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::now('Asia/Bangkok')->format('H:i:s')))) ? 'btn-secondary' : 'btn-outline-primary' }}"
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
                    <label for="schedule" class="form-label">@lang('show_consultation.choose_a_day')</label>

                    <div class="mb-2">
                        <a
                            href="{{ route('psychologist_detail', ['psychologist' => $psychologist->id, 'date' => $today->toDateString()]) }}">
                            <div class="card p-2">
                                {{ $today->format('l, d F Y') }}
                            </div>
                        </a>
                    </div>

                    @for ($i = 0; $i < 6; $i++)
                        <div class="mb-2">
                            <a
                                href="{{ route('psychologist_detail', ['psychologist' => $psychologist->id, 'date' => $today->addDays(1)->toDateString()]) }}">
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
