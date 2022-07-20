@extends('layouts.main-psychologist')

@section('title', 'Dashboard')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="tableTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered transaction-table w-100 active" id="table-all">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">@lang('show_psychologist.transaction_id')</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                {{ $transaction->id }}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">@lang('show_psychologist.patient')</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                {{ $transaction->user->name }}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">@lang('show_psychologist.date')</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">@lang('show_psychologist.consultation_type')</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <b>{{ $transaction->consultationType->name }}</b>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">@lang('show_psychologist.fee')</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                Rp. {{ number_format($transaction->price, 0, ',', '.') }}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">@lang('show_psychologist.paid_with')</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                {{ $transaction->paymentType->type_name }}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">@lang('show_psychologist.status')</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                {{ $transaction->status }}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            @if ($transaction->note != null)
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                            <div class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                <h5 class="transaction-game">@lang('show_psychologist.note_from_psychologist'):</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            {{ $transaction->note }}
                                        </div>
                                    </td>
                                </tr>
                            @endif

                            @if ($transaction->status == 'Pending')
                                <div class="d-flex justify-content-center">
                                    <form action="/psychologist/transactions/{{ $transaction->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                        <button type="submit" class="btn btn-primary">@lang('show_psychologist.accept_consultation')</button>
                                    </form>
                                </div>
                            @elseif($transaction->status == 'Confirmed')
                                @if ($transaction->consultationType->name == 'Online Consultation')
                                    <a href="{{ route('chat_page_psychologist', $transaction->id) }}">
                                        <button type="button" class="btn btn-primary">@lang('show_psychologist.chat_now')</button>
                                    </a>
                                @elseif($transaction->consultationType->name == 'Offline Consultation')
                                    {{-- add note and end consultation button for psychologist --}}
                                    <form action="{{ route('psychologist_end', $transaction) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="note" id="note" rows="3" placeholder="Type a note..."></textarea>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-danger">End Consultation</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            @elseif($transaction->status == 'Finished')
                                @if ($transaction->consultationType->name == 'Online Consultation')
                                    <a href="{{ route('chat_page_psychologist', $transaction->id) }}">
                                        <button type="button" class="btn btn-primary">@lang('show_psychologist.see_chat_history')</button>
                                    </a>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
