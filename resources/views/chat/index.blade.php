@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <h1>Chat</h1>
    @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="message-container">
        @foreach ($chats as $chat)
            <div class="message">
                <div class="message-header">
                    <div class="message-header-left">
                        <p>{{ $chat->psychologist->name }} --
                            {{ \Carbon\Carbon::parse($chat->time)->format('l, d F Y @ H:i') }}</p>
                    </div>
                </div>
                <div class="message-body">
                    <p>{{ $chat->message }}</p>
                </div>
                @if ($chat->image != null)
                    {{ $chat->image }}
                    <img src="{{ asset('storage/images/chat/' . $chat->image) }}" alt="image">
                @endif
                <hr class="mt-3 mb-3" />
            </div>
        @endforeach
    </div>
    <div class="input-container">
        <form action="{{ route('store_chat', $transaction->id) }}" method="post" enctype="multipart/form-data">
            {{-- <input type="hidden" name="transactionId" value="{{ $transaction->id }}"> --}}
            @csrf
            <input type="text" name="message" id="message" placeholder="Type a message...">
            <input type="file" name="image" id="image">
            <button type="submit" id="send-message">Send</button>
        </form>
    </div>
    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
@endsection
