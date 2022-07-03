@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center mt-3 mb-4">My Consultation</h3>
        @foreach ($transactions as $transaction)
            <div class="card">
                <div class="card-body">
                    <p>{{ $transaction->schedule-> }}</p>
                    <p>{{ $transaction->status }}</p>
                    <p>{{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}</p>
                </div>
            </div>
        @endforeach

    </div>

@endsection
