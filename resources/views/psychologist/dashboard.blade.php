@extends('layouts.main-psychologist')

@section('title', 'Dashboard')

@section('content')
    <div class="content">
        {{-- <div class="row">
            <div class="col-12">
                <h5 class="transaction-title">You've spent</h5>
                <h2 class="transaction-value">Rp 4.518.000.500</h2>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all" aria-selected="true">@lang('dashboard_psychologist.all_trx')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="success-tab" data-bs-toggle="tab" data-bs-target="#success"
                            type="button" role="tab" aria-controls="success" aria-selected="false">@lang('dashboard_psychologist.success')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending"
                            type="button" role="tab" aria-controls="pending" aria-selected="false">@lang('dashboard_psychologist.pending')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="failed-tab" data-bs-toggle="tab" data-bs-target="#failed"
                            type="button" role="tab" aria-controls="failed" aria-selected="false">@lang('dashboard_psychologist.failed')</button>
                    </li>
                </ul>
                <div class="tab-content" id="tableTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100 active" id="table-all">
                                <thead>
                                    <tr>
                                        <th>@lang('dashboard_psychologist.consultation')</th>
                                        <th>@lang('dashboard_psychologist.patient')</th>
                                        <th class="action-header">@lang('dashboard_psychologist.consultation_type')</th>
                                        <th>@lang('dashboard_psychologist.price')</th>
                                        <th class="status-header">@lang('dashboard_psychologist.status')</th>
                                        <th class="action-header">@lang('dashboard_psychologist.action')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>
                                                <div
                                                    class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                    <img class="transaction-img"
                                                        src="{{ asset('storage/images/users/' . $transaction->user->image) }}"
                                                        alt="">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                        <h5 class="transaction-game">
                                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y') }}
                                                        </h5>
                                                        <h5 class="transaction-type">
                                                            {{ \Carbon\Carbon::parse($transaction->time)->format('@ H:i') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $transaction->user->name }}
                                            </td>
                                            <td>
                                                {{ $transaction->consultationType->name }}
                                            </td>
                                            <td>
                                                Rp. {{ number_format($transaction->price, 0, ',', '.') }}
                                            </td>
                                            <td class="status">
                                                <span
                                                    class="pending w-auto d-flex  justify-content-center align-self-center">
                                                    {{ $transaction->status }}
                                                </span>
                                            </td>
                                            <td class="action">
                                                @if ($transaction->consultation_type_id == $online_consultation_id)
                                                    <a href="{{ route('chat_page_psychologist', $transaction->id) }}"
                                                        class="btn-transaction mx-auto">@lang('dashboard_psychologist.chat')</a>
                                                @elseif($transaction->consultation_type_id == $offline_consultation_id)
                                                    <a href="/psychologist/transactions/{{ $transaction->id }}"
                                                        class="btn-transaction mx-auto">@lang('dashboard_psychologist.details')</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <img class="transaction-img" src="./assets/img/home/cover.png"
                                                    alt="">

                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">@lang('dashboard_psychologist.hari_tanggal')</h5>
                                                    <h5 class="transaction-type">@lang('dashboard_psychologist.jam')</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>NANTI HAPUS</td>
                                        <td>@lang('dashboard_psychologist.offline_consultation')</td>
                                        <td>Rp 290.000</td>
                                        <td class="status">
                                            <span
                                                class="pending w-auto d-flex  justify-content-center align-self-center">@lang('dashboard_psychologist.pending')</span>
                                        </td>
                                        <td class="action"><button class="btn-transaction mx-auto">@lang('dashboard_psychologist.details')</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="success" role="tabpanel" aria-labelledby="success-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100" id="table-success">
                                <thead>
                                    <tr>
                                        <th>Game</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th class="status-header">Status</th>
                                        <th class="action-header">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <img class="transaction-img" src="./assets/img/home/cover-1.png"
                                                    alt="">

                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">Call Of Duty Ne...</h5>
                                                    <h5 class="transaction-type">Desktop</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>550 Gold</td>
                                        <td>Rp 740.000</td>
                                        <td class="status">
                                            <span
                                                class="success w-auto d-flex  justify-content-center align-self-center">Success</span>
                                        </td>
                                        <td class="action"><button class="btn-transaction mx-auto">Details</button></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <img class="transaction-img" src="./assets/img/home/cover-1.png"
                                                    alt="">

                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">Call Of Duty Ne...</h5>
                                                    <h5 class="transaction-type">Desktop</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>550 Gold</td>
                                        <td>Rp 740.000</td>
                                        <td class="status">
                                            <span
                                                class="success w-auto d-flex  justify-content-center align-self-center">Success</span>
                                        </td>
                                        <td class="action"><button class="btn-transaction mx-auto">Details</button></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100" id="table-pending">
                                <thead>
                                    <tr>
                                        <th>Game</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th class="status-header">Status</th>
                                        <th class="action-header">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <img class="transaction-img" src="./assets/img/home/cover.png"
                                                    alt="">

                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">Mobile Legen...</h5>
                                                    <h5 class="transaction-type">Desktop</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>200 Gold</td>
                                        <td>Rp 290.000</td>
                                        <td class="status">
                                            <span
                                                class="pending w-auto d-flex  justify-content-center align-self-center">Pending</span>
                                        </td>
                                        <td class="action"><button class="btn-transaction mx-auto">Details</button></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <img class="transaction-img" src="./assets/img/home/cover-3.png"
                                                    alt="">

                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">The Royale Ga...</h5>
                                                    <h5 class="transaction-type">Desktop</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>225 Gold</td>
                                        <td>Rp 200.000</td>
                                        <td class="status">
                                            <span
                                                class="pending w-auto d-flex  justify-content-center align-self-center">Pending</span>
                                        </td>
                                        <td class="action"><button class="btn-transaction mx-auto">Details</button></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <img class="transaction-img" src="./assets/img/home/cover.png"
                                                    alt="">

                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">Mobile Legen...</h5>
                                                    <h5 class="transaction-type">Desktop</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>200 Gold</td>
                                        <td>Rp 290.000</td>
                                        <td class="status">
                                            <span
                                                class="pending w-auto d-flex  justify-content-center align-self-center">Pending</span>
                                        </td>
                                        <td class="action"><button class="btn-transaction mx-auto">Details</button></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="failed" role="tabpanel" aria-labelledby="failed-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100" id="table-failed">
                                <thead>
                                    <tr>
                                        <th>Game</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th class="status-header">Status</th>
                                        <th class="action-header">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                <img class="transaction-img" src="./assets/img/home/cover-2.png"
                                                    alt="">

                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                    <h5 class="transaction-game">Clash of Clans</h5>
                                                    <h5 class="transaction-type">Mobile</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>100 Gold</td>
                                        <td>Rp 120.000</td>
                                        <td class="status">
                                            <span
                                                class="failed w-auto d-flex  justify-content-center align-self-center">Failed</span>
                                        </td>
                                        <td class="action"><button class="btn-transaction mx-auto">Details</button></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
