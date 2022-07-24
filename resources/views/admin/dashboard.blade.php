@extends('layouts.main-admin')

@section('title', 'Dashboard')

@section('content')
    <div class="content">
        <div class="my_dashboard row mb-4">
            <div class="col-12">
                <h2 class="nav-title l-font border-bottom mb-3">Users</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Users</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $users->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Psychologists</h5>
                                <p class="card-text l-font text-muted fw-bolder">{{ $psychologists->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="nav-title l-font border-bottom mb-3">Transaction</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Transactions</h5>
                                <p class="card-text l-font text-muted fw-bolder"> {{ $transactions->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Revenue</h5>
                                <p class="card-text l-font text-muted fw-bolder">Rp.
                                    {{ $transactions->where('status', '!=', 'Rejected')->sum('price') }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Online Consultation</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $transactions->where('consultation_type_id', $online_consultation_id)->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Offline Consultation</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $transactions->where('consultation_type_id', $offline_consultation_id)->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="nav-title l-font border-bottom mb-3">Transaction by Status</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Transaction Pending</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $transactions->where('status', 'Pending')->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Transaction Confirmed</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $transactions->where('status', 'Confirmed')->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Transaction Success</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $transactions->where('status', 'Finished')->count() }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Transaction Rejected</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $transactions->where('status', 'Rejected')->count() }} </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="nav-title l-font border-bottom mb-3">Others</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Review</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $reviews->count() }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Article</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $articles->count() }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Forum Topic</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $forums->count() }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Forum Topic</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $payment_types->count() }} </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="row">
            <h3 class="nav-title">All Transactions</h3>
            @if (isset($note))
                <h3>{{ $note }}</h3>
            @endif
            <div class="col-12">
                <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all"
                            aria-selected="true">@lang('dashboard_admin.all_consultation')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending"
                            type="button" role="tab" aria-controls="pending"
                            aria-selected="false">@lang('dashboard_admin.pending')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="confirmed-tab" data-bs-toggle="tab" data-bs-target="#confirmed"
                            type="button" role="tab" aria-controls="confirmed"
                            aria-selected="false">@lang('dashboard_admin.confirmed')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="finished-tab" data-bs-toggle="tab" data-bs-target="#finished"
                            type="button" role="tab" aria-controls="finished"
                            aria-selected="false">@lang('dashboard_admin.finished')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected"
                            type="button" role="tab" aria-controls="rejected"
                            aria-selected="false">@lang('dashboard_admin.rejected')</button>
                    </li>
                </ul>
                <div class="tab-content" id="tableTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table w-100 active" id="table-all">
                                <thead>
                                    <tr>
                                        <th>@lang('dashboard_admin.consultation')</th>
                                        <th>@lang('dashboard_admin.patient')</th>
                                        <th>@lang('dashboard_admin.psychologist')</th>
                                        <th class="action-header">@lang('dashboard_admin.consultation_type')</th>
                                        <th>@lang('dashboard_admin.price')</th>
                                        <th class="status-header">@lang('dashboard_admin.status')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions_all as $transaction)
                                        <tr>
                                            <td>
                                                <div
                                                    class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                        <h5 class="transaction-game">
                                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y') }}
                                                        </h5>
                                                        <div class="d-flex">
                                                            <h5 class="transaction-type me-3">
                                                                {{ \Carbon\Carbon::parse($transaction->time)->format('@ H:i') }}
                                                            </h5>
                                                            <h5 class="transaction-type">
                                                                #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                                            </h5>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $transaction->user->name }}
                                            </td>
                                            <td>
                                                {{ $transaction->psychologist->name }}
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
                                        <th>@lang('dashboard_admin.consultation')</th>
                                        <th>@lang('dashboard_admin.patient')</th>
                                        <th>@lang('dashboard_admin.psychologist')</th>
                                        <th class="action-header">@lang('dashboard_admin.consultation_type')</th>
                                        <th>@lang('dashboard_admin.price')</th>
                                        <th class="status-header">@lang('dashboard_admin.status')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions_pending as $transaction)
                                        <tr>
                                            <td>
                                                <div
                                                    class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                        <h5 class="transaction-game">
                                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y') }}
                                                        </h5>
                                                        <div class="d-flex">
                                                            <h5 class="transaction-type me-3">
                                                                {{ \Carbon\Carbon::parse($transaction->time)->format('@ H:i') }}
                                                            </h5>
                                                            <h5 class="transaction-type">
                                                                #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                                            </h5 </div>
                                                        </div>
                                            </td>
                                            <td>
                                                {{ $transaction->user->name }}
                                            </td>
                                            <td>
                                                {{ $transaction->psychologist->name }}
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
                                        <th>@lang('dashboard_admin.consultation')</th>
                                        <th>@lang('dashboard_admin.patient')</th>
                                        <th>@lang('dashboard_admin.psychologist')</th>
                                        <th class="action-header">@lang('dashboard_admin.consultation_type')</th>
                                        <th>@lang('dashboard_admin.price')</th>
                                        <th class="status-header">@lang('dashboard_admin.status')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions_confirmed as $transaction)
                                        <tr>
                                            <td>
                                                <div
                                                    class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                        <h5 class="transaction-game">
                                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y') }}
                                                        </h5>
                                                        <div class="d-flex">
                                                            <h5 class="transaction-type me-3">
                                                                {{ \Carbon\Carbon::parse($transaction->time)->format('@ H:i') }}
                                                            </h5>
                                                            <h5 class="transaction-type">
                                                                #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                                            </h5 </div>
                                                        </div>
                                            </td>
                                            <td>
                                                {{ $transaction->user->name }}
                                            </td>
                                            <td>
                                                {{ $transaction->psychologist->name }}
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
                                        <th>@lang('dashboard_admin.consultation')</th>
                                        <th>@lang('dashboard_admin.patient')</th>
                                        <th>@lang('dashboard_admin.psychologist')</th>
                                        <th class="action-header">@lang('dashboard_admin.consultation_type')</th>
                                        <th>@lang('dashboard_admin.price')</th>
                                        <th class="status-header">@lang('dashboard_admin.status')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions_finished as $transaction)
                                        <tr>
                                            <td>
                                                <div
                                                    class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                        <h5 class="transaction-game">
                                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y') }}
                                                        </h5>
                                                        <div class="d-flex">
                                                            <h5 class="transaction-type me-3">
                                                                {{ \Carbon\Carbon::parse($transaction->time)->format('@ H:i') }}
                                                            </h5>
                                                            <h5 class="transaction-type">
                                                                #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                                            </h5 </div>
                                                        </div>
                                            </td>
                                            <td>
                                                {{ $transaction->user->name }}
                                            </td>
                                            <td>
                                                {{ $transaction->psychologist->name }}
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
                                        <th>@lang('dashboard_admin.consultation')</th>
                                        <th>@lang('dashboard_admin.patient')</th>
                                        <th>@lang('dashboard_admin.psychologist')</th>
                                        <th class="action-header">@lang('dashboard_admin.consultation_type')</th>
                                        <th>@lang('dashboard_admin.price')</th>
                                        <th class="status-header">@lang('dashboard_admin.status')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions_rejected as $transaction)
                                        <tr>
                                            <td>
                                                <div
                                                    class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                        <h5 class="transaction-game">
                                                            {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y') }}
                                                        </h5>
                                                        <div class="d-flex">
                                                            <h5 class="transaction-type me-3">
                                                                {{ \Carbon\Carbon::parse($transaction->time)->format('@ H:i') }}
                                                            </h5>
                                                            <h5 class="transaction-type">
                                                                #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                                            </h5 </div>
                                                        </div>
                                            </td>
                                            <td>
                                                {{ $transaction->user->name }}
                                            </td>
                                            <td>
                                                {{ $transaction->psychologist->name }}
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
