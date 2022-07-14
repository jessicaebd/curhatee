@extends('layouts.main')

@section('title', 'My Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center mb-3">My Consultation</h3>
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

                                    <p class="card-text">Status: {{ $transaction->status }}</p>

                                    @if ($transaction->consultation_type_id == $online_consultation_id)
                                        <a href="{{ route('chat_page', $transaction->id) }}">
                                            <button type="button" class="btn btn-primary">Chat Online</button>
                                        </a>
                                    @elseif($transaction->consultation_type_id == $offline_consultation_id)
                                        <a href="/consultation/{{ $transaction->id }}">
                                            <button type="button" class="btn btn-info">See Appointment</button>
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
