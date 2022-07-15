@extends('layouts.main')

@section('title', 'My Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center mb-3">@lang('index_psychologist.my_consultation')</h3>

        <div class="d-flex justify-content-center">
            <div class="row px-0 py-2 d-flex justify-content-between shadow-sm rounded-pill"
                style="background-color: #00000005">
                <div class="" style="width: 20rem;">
                    <button class="btn btn-light text-primary shadow-sm btn-block rounded-pill" type="button"
                        data-bs-toggle="collapse" data-bs-target="#filter-article" aria-expanded="false"
                        aria-controls="filter-article" style="width: 100%">
                        <b>@lang('index_psychologist.incoming_request')</b>
                    </button>
                </div>
                <div class="" style="width: 20rem;">
                    <button class="btn text-secondary btn-block rounded-pill" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filter-video" aria-expanded="false" aria-controls="filter-video"
                        style="width: 100%">
                        @lang('index_psychologist.all_consultation')
                    </button>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-10">
                <div class="row">
                    @foreach ($transactions as $transaction)
                        <div class="col-md-12">
                            <a href="/consultation/{{ $transaction->id }}">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="card-text">{{ $transaction->user->name }}</p>
                                        <p class="card-text">
                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}
                                        </p>

                                        <p class="card-text">Status: {{ $transaction->status }}</p>
                                        @if ($transaction->status == 'Pending')
                                            <form action="/consultation/{{ $transaction->id }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="transaction_id"
                                                    value="{{ $transaction->id }}">

                                                <button type="submit" class="btn btn-primary btn-sm">@lang('index_psychologist.accept_request')</button>
                                                <button type="submit" class="btn btn-primary btn-sm">@lang('index_psychologist.decline_request')</button>
                                            </form>
                                        @endif

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
