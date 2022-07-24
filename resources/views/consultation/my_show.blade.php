@extends('layouts.main')

@section('title', 'My Consultation')

@section('content')
    <div class="container mt-5 pt-5" style="min-height: 70vh">
        <div class="row d-flex justify-content-center">
            @if ($transaction->status == 'Pending' || $transaction->status == 'Confirmed')
                <div class="col-md-6 shadow p-5 rounded">
                    <div class="detail mb-3">
                        <table class="s-font">
                            <tr>
                                <td class="fw-bolder">@lang('my_show.transaction_id')</td>
                                <td>: #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.psychologist')</td>
                                <td>: {{ $transaction->schedule->psychologist->name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.date')</td>
                                <td>:
                                    {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.transaction_id')</td>
                                <td>: {{ $transaction->consultationType->name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.status')</td>
                                <td>: {{ $transaction->status }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.fee')</td>
                                <td>: Rp. {{ number_format($transaction->price, 0, ',', '.') }}
                                </td>
                            </tr>

                            <tr>
                                <td class="fw-bolder">@lang('my_show.paid_with')</td>
                                <td>: {{ $transaction->paymentType->type_name }}</td>
                            </tr>
                        </table>
                        @if ($transaction->status == 'Confirmed')
                            <div class="d-flex flex-column fw-bolder align-items-center mt-3">
                                <p class="text-muted mb-2 s-font">@lang('consultation.Show the QR Code below to the receptionist')</p>
                                {{ QrCode::size(100)->generate($transaction->id) }}
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="modal-body">
                    <div class="detail mb-3">
                        <table class="s-font">
                            <tr>
                                <td class="fw-bolder">@lang('my_show.transaction_id')</td>
                                <td>: #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.psychologist')</td>
                                <td>: {{ $transaction->schedule->psychologist->name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.date')</td>
                                <td>:
                                    {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.transaction_id')</td>
                                <td>: {{ $transaction->consultationType->name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.status')</td>
                                <td>: {{ $transaction->status }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bolder">@lang('my_show.fee')</td>
                                <td>: Rp. {{ number_format($transaction->price, 0, ',', '.') }}
                                </td>
                            </tr>

                            <tr>
                                <td class="fw-bolder">@lang('my_show.paid_with')</td>
                                <td>: {{ $transaction->paymentType->type_name }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="note s-font card px-3 py-2 mb-3">
                        <span class="text-muted s-font"><span class="fw-bolder">@lang('consultation.Note')</span>
                            @if ($transaction->note != null)
                                {{ $transaction->note }}
                            @else
                                -
                            @endif
                        </span>
                    </div>

                    @if ($transaction->review != null)
                        <h5 class="fw-bolder s-font">@lang('consultation.Review')</h5>
                        <div class="my-review s-font card px-3 py-2">
                            <div class="pe-2">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $transaction->review->rating)
                                        <i class="bi bi-star-fill text-warning"></i>
                                    @else
                                        <i class="bi bi-star text-warning"></i>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-muted">{{ $transaction->review->comment }}</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
@endsection
