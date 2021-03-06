@extends('layouts.main')

<link rel="stylesheet" href="{{ asset('css/rating.css') }}">

@section('title', 'My Consultation')

@section('content')
    <div class="container mt-5 pt-5" style="min-height: 70vh">
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
                        <h6 class="text-center">@lang('consultation.You have no consultation at the moment')
                            <a class="link-primary" href="{{ route('consultation_index') }}">@lang('consultation.Browse Now')</a>
                        </h6>
                    </div>
                @else
                    <h3 class="text-center fw-bolder mb-3">@lang('my_index.my_consultation')</h3>

                    <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                type="button" role="tab" aria-controls="all"
                                aria-selected="true">@lang('consultation.All')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending"
                                type="button" role="tab" aria-controls="pending"
                                aria-selected="false">@lang('dashboard_psychologist.pending')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="confirmed-tab" data-bs-toggle="tab" data-bs-target="#confirmed"
                                type="button" role="tab" aria-controls="confirmed"
                                aria-selected="false">@lang('dashboard_psychologist.confirmed')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="finished-tab" data-bs-toggle="tab" data-bs-target="#finished"
                                type="button" role="tab" aria-controls="finished"
                                aria-selected="false">@lang('dashboard_psychologist.finished')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected"
                                type="button" role="tab" aria-controls="rejected"
                                aria-selected="false">@lang('dashboard_psychologist.rejected')</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="tableTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="row">
                                <div class="history mb-2">
                                    <b><i class="bi bi-calendar-week"></i> @lang('consultation.Ongoing Transaction')</b>
                                </div>
                                @foreach ($transactions as $transaction)
                                    @include('consultation.transaction_card')
                                @endforeach
                                <br>

                                @if (count($transaction_histories) > 0)
                                    <div class="history mb-2 mt-4">
                                        <b><i class="bi bi-calendar-check"></i> @lang('consultation.History Transaction')</b>
                                    </div>
                                    <br>
                                    @foreach ($transaction_histories as $transaction)
                                        @include('consultation.transaction_card')
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                            <div class="row">
                                @foreach ($transactions as $transaction)
                                    @if ($transaction->status == 'Pending')
                                        @include('consultation.transaction_card')
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="confirmed" role="tabpanel" aria-labelledby="confirmed-tab">
                            <div class="row">
                                @foreach ($transactions as $transaction)
                                    @if ($transaction->status == 'Confirmed')
                                        @include('consultation.transaction_card')
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="finished" role="tabpanel" aria-labelledby="finished-tab">
                            @if (count($transaction_histories) > 0)
                                <div class="row">
                                    @foreach ($transaction_histories as $transaction)
                                        @if ($transaction->status == 'Finished')
                                            @include('consultation.transaction_card')
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                            @if (count($transaction_histories) > 0)
                                <div class="row">
                                    @foreach ($transaction_histories as $transaction)
                                        @if ($transaction->status == 'Rejected')
                                            @include('consultation.transaction_card')
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
