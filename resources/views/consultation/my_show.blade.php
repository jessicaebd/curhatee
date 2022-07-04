@extends('layouts.main')

@section('title', 'My Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center my-3">My Consultation</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <table>
                    <tr>
                        <td>Transaction ID</td>
                        <td>: {{ $transaction->id }}</td>
                    </tr>
                    <tr>
                        <td>Psychologist</td>
                        <td>: {{ $transaction->schedule->psychologist->name }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>: {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{ $transaction->status }}</td>
                    </tr>
                    <tr>
                        <td>Fee</td>
                        <td>: Rp. {{ number_format($transaction->fee, 0, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <td>Description:</td>
                        <td>{{ $transaction->description }}</td>
                    </tr>
                </table>
            </div>
        </div>



    </div>

@endsection
