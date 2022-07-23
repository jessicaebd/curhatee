@extends('layouts.main')

<link rel="stylesheet" href="{{ asset('css/rating.css') }}">

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
                        <h6 class="text-center">You have no consultation at the moment.
                            <a class="link-primary" href="{{ route('consultation_index') }}">Browse Now</a>
                        </h6>
                    </div>
                @else
                    <h3 class="text-center fw-bolder mb-3">@lang('my_index.my_consultation')</h3>

                    <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
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
                                @foreach ($transactions as $transaction)
                                    @include('consultation.transaction_card')
                                @endforeach

                                @if (count($transaction_histories) > 0)
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
                                @foreach ($transaction_histories as $transaction)
                                    @if ($transaction->status == 'Finished')
                                        @include('consultation.transaction_card')
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                            @if (count($transaction_histories) > 0)
                                @foreach ($transaction_histories as $transaction)
                                    @if ($transaction->status == 'Rejected')
                                        @include('consultation.transaction_card')
                                    @endif
                                @endforeach
                            @endif
                        </div>

                    </div>


                @endif
            </div>
        </div>
    </div>

    {{-- !BELUM --}}
    {{-- @if (count($transaction_histories) > 0)
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
    @endif --}}
    <script type="text/javascript">
        $("#submit").click(function() {
            var id = $("#transaction_id").val();
            var marks = $("#marks").val();
            var str = "You Have Entered " +
                "Name: " + name +
                " and Marks: " + marks;
            $("#modal_body").html(str);
        });
    </script>
@endsection
