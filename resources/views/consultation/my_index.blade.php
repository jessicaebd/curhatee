@extends('layouts.main')

@section('title', 'My Consultation')

@section('content')
    <div class="container mt-5 pt-5">
        {{-- Success Message --}}
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                @if ($transactions->isEmpty())
                    <div class="d-flex align-items-center justify-content-center" style="height: 60vh">
                        <h6 class="text-center">You have no consultation at the moment. <a
                                href="{{ route('consultation_index') }}">Browse Now</a>
                        </h6>
                    </div>
                @else
                    <h3 class="text-center fw-bolder mb-3">@lang('my_index.my_consultation')</h3>

                    <div class="row">
                        @foreach ($transactions as $transaction)
                            <div class="col-md-6">
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <div class="card-title border-bottom">
                                            <h5 class="m-font fw-bold mb-0">Transaction
                                                #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                            </h5>
                                            <small
                                                class="text-muted s-font">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d F Y, H:i') }}</small>
                                        </div>

                                        <div class="transaction d-flex mb-2">
                                            <img class="rounded rounded-pill"
                                                src="{{ asset('storage/images/psychologists/' . $transaction->schedule->psychologist->image) }}"
                                                alt="" style="width: 50px;height: 50px;">
                                            <div class="fw-bolder ms-3">
                                                <small
                                                    class="card-text">{{ $transaction->schedule->psychologist->name }}</small>
                                                <br>
                                                <small
                                                    class="card-text xs-font">{{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}</small>
                                            </div>
                                        </div>

                                        <div class="transaction-status d-flex mb-2">
                                            <div class="">
                                                <h6 class="fw-bolder mb-0">
                                                    @if ($transaction->status == 'Pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif ($transaction->status == 'Confirmed')
                                                        <span class="badge bg-success">Confirmed</span>
                                                    @elseif ($transaction->status == 'Finished')
                                                        <span class="badge bg-secondary">Finished</span>
                                                    @elseif ($transaction->status == 'Cancelled')
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @endif
                                                </h6>
                                            </div>
                                            <div class="ms-2">
                                                <h6>
                                                    <span
                                                        class="{{ $transaction->consultation_type_id == $online_consultation_id ? 'badge bg-green' : 'badge bg-blue' }}">{{ $transaction->consultationType->name }}
                                                    </span>
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-outline-blue s-font fw-bolder py-1 px-3"
                                                href="/consultation/{{ $transaction->id }}">
                                                @lang('my_index.see_detail')
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if (count($transaction_histories) > 0)
        <h3 class="text-center mb-3">@lang('my_index.my_consultation_history')</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    @foreach ($transaction_histories as $transaction_history)
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="card-text">{{ $transaction_history->schedule->psychologist->name }}</p>
                                    <p class="card-text">
                                        {{ \Carbon\Carbon::parse($transaction_history->time)->format('l, d F Y @ H:i') }}
                                    </p>

                                    <p class="card-text">@lang('my_index.status'): {{ $transaction_history->status }}</p>

                                    {{-- ini mau badge tdny jg css gabisa. putih smua --}}
                                    <span class="btn btn-primary">{{ $transaction_history->consultationType->name }}
                                    </span>

                                    @if ($transaction_history->review != null)
                                        <h5>@lang('my_index.your_review')</h5>
                                        <div class="pe-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $transaction_history->review->rating)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @else
                                                    <i class="bi bi-star text-warning"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    @endif

                                    <a href="/consultation/{{ $transaction_history->id }}">
                                        <button type="button" class="btn btn-secondary">
                                            @if ($transaction_history->review != null)
                                                @lang('my_index.see_detail')
                                            @else
                                                @lang('my_index.give_review')
                                            @endif
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection
