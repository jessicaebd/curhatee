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
                </table>
            </div>
        </div>

        <h1>Consultation Type: {{ $transaction->consultationType->name }}</h1>
        <h1>Status: {{ $transaction->status }}</h1>
        @if ($transaction->status == 'Finished' && $transaction->consultationType->name == 'Online Consultation')
            <a href="{{ route('chat_page_user', $transaction->id) }}">
                <button type="button" class="btn btn-primary">See Chat History</button>
            </a>
        @endif
        @if ($transaction->status == 'Finished' && $transaction->note != null)
            <h2>@lang('my_show.note_from_psychologist')</h2>
            {{ $transaction->note }}
        @endif
        @if ($transaction->status == 'Pending')
            <h2>Still waiting psychologist to confirmed consultation</h2>
        @elseif($transaction->status == 'Confirmed')
            @if ($transaction->consultationType->name == 'Online Consultation')
                <h2>You can chat with psychologist now</h2>
                <a href="{{ route('chat_page_user', $transaction->id) }}">
                    <button type="button" class="btn btn-primary">Chat Online</button>
                </a>
            @elseif($transaction->consultationType->name == 'Offline Consultation')
                <h2>Dont forget to go on time</h2>
            @endif
        @elseif (($transaction->status == 'Finished' || $transaction->status == 'Rejected') && $transaction->review == null)
            {{-- review input form for user who not yet review --}}
            <h1>Give Your Review</h1>
            <div class="input-container mt-3">
                <form action="{{ route('store_review', $transaction->id) }}" method="post">
                    @csrf
                    <label for="rating" class="form-label">Overall Rating</label>
                    <select class="form-select @error('rating') is-invalid @enderror" name="rating">
                        <option selected disabled>-</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value={{ $i }} {{ old('rating') == $i ? 'selected' : '' }}>
                                @for ($j = 0; $j < 5; $j++)
                                    @if ($j < $i)
                                        <i class="bi bi-star-fill text-warning"></i>a
                                    @else
                                        <i class="bi bi-star text-warning"></i>b
                                    @endif
                                @endfor
                            </option>
                        @endfor
                    </select>

                    <div class="row">
                        <div class="col-md-10">
                            <input class="form-control @error('comment') is-invalid @enderror" type="text" name="comment"
                                id="comment" placeholder="Type a comment...">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit" id="send-comment">@lang('index_chat.send_review')</button>
                        </div>
                    </div>
                </form>
            </div>
        @elseif($transaction->status == 'Finished' && $transaction->review->id != null)
            {{-- already review by user --}}
            <h1>Consultation Rating</h1>
            <div class="pe-2">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $transaction->review->rating)
                        <i class="bi bi-star-fill text-warning"></i>
                    @else
                        <i class="bi bi-star text-warning"></i>
                    @endif
                @endfor
            </div>
            <p>{{ $transaction->review->comment }}</p>
        @endif
    </div>

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
@endsection
