@extends('layouts.main-admin')

@section('title', 'Manage Psychologist Transactions')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- psychologist profile --}}
        <div class="card psychologist-card" style="border-radius: 15px; height: 15rem;">
            <div class="card-body p-4">
                <div class="d-flex text-black">
                    <div class="flex-shrink-0">
                        <img src="{{ file_exists(public_path() . "/storage/images/psychologists/$psychologist->image") ? asset("/storage/images/psychologists/$psychologist->image") : asset('/storage/psychologists/default-psychologist.jpg') }}"
                            alt="profile" class="img-fluid" style="width: 10rem; height:10rem; border-radius: 10px;">
                    </div>

                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1 m-font fw-bolder">{{ $psychologist->name }}</h5>

                        <p class="mb-2 pb-1 xs-font text-muted" style="color: #2b2a2a;">
                            {{ $psychologist->hospital->name }}</p>

                        <div class="d-flex justify-content-between rounded-3 p-2 mb-2" style="background-color: #efefef;">
                            <div class="ps-2">
                                <p class="small text-center text-muted mb-1">@lang('index_admin_psychologist.transaction')</p>
                                <p class="mb-0 text-center">
                                    {{ $psychologist->transaction->count() }}
                                </p>
                            </div>
                            <div class="px-2">
                                <p class="small text-center text-muted mb-1">@lang('index_admin_psychologist.fee')</p>
                                <p class="mb-0 text-center">IDR {{ $psychologist->fee }}</p>
                            </div>
                            <div class="pe-2">
                                <p class="small text-center text-muted mb-1">@lang('index_admin_psychologist.rating')</p>
                                <p class="mb-0 text-center">{{ $psychologist->rating }}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('edit_psychologist', $psychologist->id) }}"
                                class="btn btn-outline-primary me-1 flex-grow-1">
                                <i class="bi bi-pencil-square me-2"></i> @lang('index_admin_psychologist.edit')
                            </a>

                            <form action="{{ route('delete_psychologist', $psychologist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger flex-grow-1">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- pscyhologist ongoing transactions --}}
        @if ($transactions->isEmpty())
            <div class="d-flex align-items-center justify-content-center" style="height: 60vh">
                <h6 class="text-center">@lang('show_admin_psychologits.you_have_no_consultation_at_the_moment')</h6>
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

                                {{-- ini harusny ga button si, badge. tp gamau cssny jdny putih kalo pake badge --}}
                                <span
                                    class="{{ $transaction->consultation_type_id == $online_consultation_id ? 'btn btn-secondary' : 'btn btn-primary' }}">{{ $transaction->consultationType->name }}
                                </span>

                                <a href="/consultation/{{ $transaction->id }}">
                                    <button type="button" class="btn btn-info">@lang('my_index.see_detail')</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        {{-- psychologist history transactions --}}
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

                                        {{-- ini mau badge tdny jg css gabisa. putih smua --}}
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
        @endif
    </div>
@endsection
