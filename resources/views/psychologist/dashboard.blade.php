@extends('layouts.main-psychologist')

@section('title', 'Dashboard')

@section('content')
    <div class="container p-5">
        <div class="my_dashboard row mb-4">
            <div class="col-12">
                <h2 class="xl-font fw-bold mb-3">@lang('psychologist.My Dashboard')</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('psychologist.Total Earnings')</h5>
                                <p class="card-text l-font text-muted fw-bolder">Rp.
                                    {{ $psychologist->transaction->where('status', '!=', 'Rejected')->sum('price') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('psychologist.Total Transaction')</h5>
                                <p class="card-text l-font text-muted fw-bolder">{{ $psychologist->transaction->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('psychologist.Ratings')</h5>
                                <p class="card-text l-font text-muted fw-bolder"> {{ $psychologist->rating }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="latest_transaction row mb-4">
            <div class="col-12">
                <h2 class="nav-title l-font border-bottom mb-3">@lang('psychologist.Latest Transaction')</h2>
                @if ($latest_transaction != null)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title border-bottom">
                                    <h5 class="m-font fw-bold mb-0">@lang('psychologist.Transaction')
                                        #{{ Str::limit(Str::substr($latest_transaction->id, -5), 5, '') }}
                                    </h5>
                                    <small
                                        class="text-muted xs-font">{{ \Carbon\Carbon::parse($latest_transaction->created_at)->format('d F Y, H:i') }}</small>
                                </div>

                                <div class="transaction fw-bolder mb-2">
                                    <small class="card-text">{{ $latest_transaction->user->name }}</small>
                                    <br>
                                    <small
                                        class="card-text s-font">{{ \Carbon\Carbon::parse($latest_transaction->time)->format('l, d F Y @ H:i') }}</small>
                                </div>

                                <div class="transaction-status d-flex mb-2">
                                    <div class="">
                                        <h6 class="fw-bolder mb-0">
                                            @if ($latest_transaction->status == 'Pending')
                                                <span class="badge bg-warning">@lang('psychologist.Pending')</span>
                                            @elseif ($latest_transaction->status == 'Confirmed')
                                                <span class="badge bg-success">@lang('psychologist.Confirmed')</span>
                                            @elseif ($latest_transaction->status == 'Finished')
                                                <span class="badge bg-secondary">@lang('psychologist.Finished')</span>
                                            @elseif ($latest_transaction->status == 'Rejected')
                                                <span class="badge bg-danger">@lang('psychologist.Rejected')</span>
                                            @endif
                                        </h6>
                                    </div>
                                    <div class="ms-2">
                                        <h6>
                                            <span
                                                class="{{ $latest_transaction->consultationType->name == 'Online Consultation' ? 'badge bg-green' : 'badge bg-blue' }}">{{ $latest_transaction->consultationType->name }}
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @lang('psychologist.You have no transaction yet')
                @endif

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2 class="nav-title l-font border-bottom mb-3">@lang('psychologist.My Consultation')</h2>

                @if (isset($note))
                    <h3>{{ $note }}</h3>
                @endif
                <div class="col-12">
                    <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                type="button" role="tab" aria-controls="all" aria-selected="true">@lang('psychologist.All')</button>
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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="online-tab" data-bs-toggle="tab" data-bs-target="#online"
                                type="button" role="tab" aria-controls="online"
                                aria-selected="false">@lang('dashboard_psychologist.online_consultation')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="offline-tab" data-bs-toggle="tab" data-bs-target="#offline"
                                type="button" role="tab" aria-controls="offline"
                                aria-selected="false">@lang('dashboard_psychologist.offline_consultation')</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="tableTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="table-responsive">
                                <table class="table table-borderless transaction-table w-100 active" id="table-all">
                                    <thead>
                                        <tr>
                                            <th class="fw-bolder">@lang('dashboard_psychologist.consultation')</th>
                                            <th class="fw-bolder">@lang('dashboard_psychologist.patient')</th>
                                            <th class="fw-bolder">@lang('dashboard_psychologist.consultation_type')</th>
                                            <th class="fw-bolder">@lang('dashboard_psychologist.price')</th>
                                            <th class="fw-bolder">@lang('dashboard_psychologist.status')</th>
                                            <th class="fw-bolder">@lang('dashboard_psychologist.action')</th>
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

                        <div class="tab-pane fade" id="online" role="tabpanel" aria-labelledby="online-tab">
                            <div class="table-responsive">
                                <table class="table table-borderless transaction-table w-100 active" id="table-online">
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
                                        @foreach ($transactions_online as $transaction)
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

                        <div class="tab-pane fade" id="offline" role="tabpanel" aria-labelledby="offline-tab">
                            <div class="table-responsive">
                                <table class="table table-borderless transaction-table w-100 active" id="table-offline">
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
                                        @foreach ($transactions_offline as $transaction)
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

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
