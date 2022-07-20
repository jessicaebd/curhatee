@extends('layouts.main')

@section('title', 'My Consultation')

@section('content')

    <br><br><br><br><br>
    {{-- Success Message --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                @if ($transactions->isEmpty())
                    <div class="d-flex align-items-center justify-content-center" style="height: 60vh">
                        <h6 class="text-center">You have no consultation at the moment.</h6>
                    </div>
                @else
                    <h3 class="text-center mb-3">@lang('my_index.my_consultation')</h3>
                    <div class="row">
                        @foreach ($transactions as $transaction)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="card-text">{{ $transaction->schedule->psychologist->name }}</p>
                                        <p class="card-text">
                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}
                                        </p>

                                        <p class="card-text">@lang('my_index.status'): {{ $transaction->status }}</p>

                                        @if ($transaction->consultation_type_id == $online_consultation_id)
                                            <a href="{{ route('chat_page_user', $transaction->id) }}">
                                                <button type="button" class="btn btn-primary">@lang('my_index.chat_online')</button>
                                            </a>
                                        @elseif($transaction->consultation_type_id == $offline_consultation_id)
                                            <a href="/consultation/{{ $transaction->id }}">
                                                <button type="button" class="btn btn-info">@lang('my_index.see_appointment')</button>
                                            </a>
                                        @endif

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

                                    <span class="badge badge-primary">{{ $transaction_history->consultationType->name }}
                                    </span>

                                    @if ($transaction_history->isReviewed == 'true')
                                        <span class="badge badge-success">@lang('my_index.reviewed')</span>
                                    @elseif($transaction_history->isReviewed == 'false')
                                        <a href="{{ route('chat_page_user', $transaction_history->id) }}">
                                            <button type="button" class="btn btn-primary">Review Now</button>
                                        </a>
                                    @endif

                                    @if ($transaction_history->consultation_type_id == $online_consultation_id)
                                        <a href="{{ route('chat_page_user', $transaction_history->id) }}">
                                            <button type="button" class="btn btn-primary">@lang('my_index.chat_online')</button>
                                        </a>
                                    @elseif($transaction_history->consultation_type_id == $offline_consultation_id)
                                        <a href="/consultation/{{ $transaction_history->id }}">
                                            <button type="button" class="btn btn-info">@lang('my_index.see_appointment')</button>
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    </div>

@endsection
