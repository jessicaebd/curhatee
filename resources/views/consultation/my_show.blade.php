@extends('layouts.main')

@section('title', 'My Consultation')

@section('content')
    <div class="container">
        <h3 class="text-center my-3">@lang('my_show.my_consultation')</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <table>
                    <tr>
                        <td>@lang('my_show.transaction_id')</td>
                        <td>: {{ $transaction->id }}</td>
                    </tr>
                    <tr>
                        <td>@lang('my_show.psychologist')</td>
                        <td>: {{ $transaction->schedule->psychologist->name }}</td>
                    </tr>
                    <tr>
                        <td>@lang('my_show.date')</td>
                        <td>: {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}</td>
                    </tr>
                    <tr>
                        <td>@lang('my_show.status')</td>
                        <td>: {{ $transaction->status }}</td>
                    </tr>
                    <tr>
                        <td>@lang('my_show.fee')</td>
                        <td>: Rp. {{ number_format($transaction->price, 0, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <td>@lang('my_show.paid_with')</td>
                        <td>: {{ $transaction->paymentType->type_name }}</td>
                    </tr>
                    <tr>
                        <td>@lang('my_show.description')</td>
                        <td>: {{ $transaction->detail }}</td>
                    </tr>
                </table>
            </div>
        </div>



    </div>

@endsection
