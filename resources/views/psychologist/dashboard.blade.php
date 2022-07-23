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
            <h3 class="nav-title">My Consultation</h3>
            @if (isset($note))
                <h3>{{ $note }}</h3>
            @endif
            <div class="col-12">
                <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all"
                            aria-selected="true">@lang('dashboard_psychologist.all_consultation')</button>
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
                                    @foreach ($transactions_all as $transaction)
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
                                                <span
                                                    class="{{ strtolower(str_replace(' ', '-', $transaction->consultationType->name)) }}   w-auto d-flex justify-content-center
                                                align-self-center">
                                                    {{ $transaction->consultationType->name }}
                                                </span>
                                            </td>
                                            <td>
                                                Rp. {{ number_format($transaction->price, 0, ',', '.') }}
                                            </td>
                                            <td class="status">
                                                <span
                                                    class=" 
                                                    {{ strtolower($transaction->status) }} w-auto d-flex justify-content-center
                                                    align-self-center">
                                                    {{ $transaction->status }}
                                                </span>
                                            </td>
                                            <td class="action">
                                                <a href="/psychologist/transactions/{{ $transaction->id }}"
                                                    class="btn-transaction mx-auto">@lang('dashboard_psychologist.details')</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100" id="table-pending">
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
                                    @foreach ($transactions_pending as $transaction)
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
                                                <a href="/psychologist/transactions/{{ $transaction->id }}"
                                                    class="btn-transaction mx-auto">@lang('dashboard_psychologist.details')</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="confirmed" role="tabpanel" aria-labelledby="confirmed-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100" id="table-confirmed">
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
                                    @foreach ($transactions_confirmed as $transaction)
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
                                                    class="confirmed w-auto d-flex  justify-content-center align-self-center">
                                                    {{ $transaction->status }}
                                                </span>
                                            </td>
                                            <td class="action">
                                                <a href="/psychologist/transactions/{{ $transaction->id }}"
                                                    class="btn-transaction mx-auto">@lang('dashboard_psychologist.details')</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="finished" role="tabpanel" aria-labelledby="finished-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100" id="table-finished">
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
                                    @foreach ($transactions_finished as $transaction)
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
                                                    class="finished w-auto d-flex  justify-content-center align-self-center">
                                                    {{ $transaction->status }}
                                                </span>
                                            </td>
                                            <td class="action">
                                                <a href="/psychologist/transactions/{{ $transaction->id }}"
                                                    class="btn-transaction mx-auto">@lang('dashboard_psychologist.details')</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100" id="table-rejected">
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
                                    @foreach ($transactions_rejected as $transaction)
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
                                                    class="rejected w-auto d-flex  justify-content-center align-self-center">
                                                    {{ $transaction->status }}
                                                </span>
                                            </td>
                                            <td class="action">
                                                <a href="/psychologist/transactions/{{ $transaction->id }}"
                                                    class="btn-transaction mx-auto">@lang('dashboard_psychologist.details')</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
