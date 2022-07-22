@extends('layouts.main-admin')

@section('title', 'Dashboard')

@section('content')
    <div class="content">
        Total users: {{ $users->count() }}
        <br>
        Total psychologists: {{ $psychologists->count() }}
        <br>
        Total transaction: {{ $transactions->count() }}
        <br>
        Total review: {{ $reviews->count() }}
        <br>
        Total article: {{ $articles->count() }}
        <br>
        Total forum topic: {{ $forums->count() }}
        <br>
        Total payment 3rd party: {{ $payment_types->count() }}
    </div>
@endsection
