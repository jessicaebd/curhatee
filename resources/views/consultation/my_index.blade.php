@extends('layouts.main')

@section('title', 'My Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center mb-3">@lang('my_index.my_consultation')</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
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
            </div>
        </div>



    </div>

@endsection
