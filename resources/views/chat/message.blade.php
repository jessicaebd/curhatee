<div class="day-label d-flex justify-content-center py-2">
    {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y') }}
</div>
@foreach ($chats as $chat)

    {{-- view user --}}
    @if ($view == 'User')
        {{-- chat lawan --}}
        @if ($chat->user_id == null)
            <div class="message px-2 py-2 d-flex flex-column align-items-start">
                <div class="message-header mb-2">
                    <div class="message-header-left">
                        @if ($chat->user_id != null)
                            <img src="{{ asset('/storage/images/users/' . $transaction->user->image) }}"
                                alt="profile picture" style="width: 35px; height: 35px; overflow: hidden;">
                            <b>{{ $chat->user->name }}</b>
                        @elseif($chat->psychologist_id != null)
                            <img src="{{ asset('/storage/images/psychologists/' . $transaction->psychologist->image) }}"
                                alt="profile picture" style="width: 35px; height: 35px; overflow: hidden;">
                            <b>{{ $chat->psychologist->name }}</b>
                        @endif

                        <span class="text-muted">{{ \Carbon\Carbon::parse($chat->sent_at)->format('H:i') }}</span>
                    </div>
                </div>
                @if ($chat->message != null)
                    <div class="message-body">
                        <p class="mb-0">{!! $chat->message !!}</p>
                    </div>
                @endif

                @if ($chat->image != null)
                    {{-- {{ $chat->image }} --}}
                    <img src="{{ asset('/storage/images/chat/' . $chat->image) }}" alt="image">
                @endif
            </div>
        @else
            {{-- chat sendiri --}}
            <div class="message px-2 py-2 d-flex flex-column align-items-end">
                <div class="message-header mb-2">
                    <div class="message-header-left">
                        <span class="text-muted ">{{ \Carbon\Carbon::parse($chat->sent_at)->format('H:i') }}</span>
                    </div>
                </div>
                @if ($chat->message != null)
                    <div class="message-body-self">
                        <p class="mb-0">{!! $chat->message !!}</p>
                    </div>
                @endif
                @if ($chat->image != null)
                    {{-- {{ $chat->image }} --}}
                    <img src="{{ asset('/storage/images/chat/' . $chat->image) }}" alt="image">
                @endif
            </div>
        @endif
        {{-- view psycho --}}
    @else
        {{-- chat lawan --}}
        @if ($chat->psychologist_id == null)
            <div class="message px-2 py-2 d-flex flex-column align-items-start">
                <div class="message-header mb-2">
                    <div class="message-header-left">
                        @if ($chat->user_id != null)
                            <img src="{{ asset('/storage/images/users/' . $transaction->user->image) }}"
                                alt="profile picture" style="width: 40px; height: 40px; overflow: hidden;">
                            <b>{{ $chat->user->name }}</b>
                        @elseif($chat->psychologist_id != null)
                            <img src="{{ asset('/storage/images/psychologists/' . $transaction->psychologist->image) }}"
                                alt="profile picture" style="width: 40px; height: 40px; overflow: hidden;">
                            <b>{{ $chat->psychologist->name }}</b>
                        @endif

                        <span class="text-muted">{{ \Carbon\Carbon::parse($chat->sent_at)->format('H:i') }}</span>
                    </div>
                </div>
                @if ($chat->message != null)
                    <div class="message-body">
                        <p class="mb-0">{!! $chat->message !!}</p>
                    </div>
                @endif
                @if ($chat->image != null)
                    {{-- {{ $chat->image }} --}}
                    <img src="{{ asset('/storage/images/chat/' . $chat->image) }}" alt="image">
                @endif
            </div>
        @else
            {{-- chat sendiri --}}
            <div class="message px-2 py-2 d-flex flex-column align-items-end">
                <div class="message-header mb-2">
                    <div class="message-header-left">
                        <span class="text-muted ">{{ \Carbon\Carbon::parse($chat->sent_at)->format('H:i') }}</span>
                    </div>
                </div>
                @if ($chat->message != null)
                    <div class="message-body-self">
                        <p class="mb-0">{!! $chat->message !!}</p>
                    </div>
                @endif
                @if ($chat->image != null)
                    {{-- {{ $chat->image }} --}}
                    <img src="{{ asset('/storage/images/chat/' . $chat->image) }}" alt="image">
                @endif
            </div>
        @endif
    @endif
    {{-- <div class="message-header mb-2">
            <div class="message-header-left">
                @if ($chat->user_id != null)
                    <img src="{{ asset('/storage/images/users/' . $transaction->user->image) }}" alt="profile picture"
                        style="width: 40px; height: 40px; overflow: hidden;">
                    <b>{{ $chat->user->name }}</b>
                @elseif($chat->psychologist_id != null)
                    <img src="{{ asset('/storage/images/psychologists/' . $transaction->psychologist->image) }}"
                        alt="profile picture" style="width: 40px; height: 40px; overflow: hidden;">
                    <b>{{ $chat->psychologist->name }}</b>
                @endif
                --
                {{ \Carbon\Carbon::parse($chat->sent_at)->format('l, d F Y @ H:i') }}
            </div>
        </div>
        <div class="message-body">
            <p class="mb-0">{!! $chat->message !!}</p>
        </div> --}}
    {{-- @if ($chat->image != null)
        {{ $chat->image }}
        <img src="{{ asset('/storage/images/chat/' . $chat->image) }}" alt="image">
    @endif --}}
    {{-- <hr class="my-0" /> --}}
@endforeach

<script>
    var messageContainer = document.querySelector('#message-container');
    messageContainer.scrollTop = messageContainer.scrollHeight - messageContainer.clientHeight;
</script>
