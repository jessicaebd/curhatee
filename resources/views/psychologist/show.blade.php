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
                                                    <h5 class="transaction-game">Transaction ID</h5>
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
                                                    <h5 class="transaction-game">Patient</h5>
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
                                                    <h5 class="transaction-game">Date</h5>
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
                                                    <h5 class="transaction-game">Fee</h5>
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
                                                    <h5 class="transaction-game">Paid with</h5>
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
                                                    <h5 class="transaction-game">Description</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                {{ $transaction->detail }}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">Status</h5>
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

                            @if ($transaction->status == 'Pending')
                                <div class="d-flex justify-content-center">
                                    <form action="/psychologist/transactions/{{ $transaction->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                        <button type="submit" class="btn btn-primary">Accept Consultation</button>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
