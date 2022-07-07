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
                            <a href="/consultation/{{ $transaction->id }}">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="card-text">{{ $transaction->schedule->psychologist->name }}</p>
                                        <p class="card-text">
                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}
                                        </p>

                                        <p class="card-text">Status: {{ $transaction->status }}</p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



    </div>

@endsection
