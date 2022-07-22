@foreach ($chats as $chat)
    <div class="message px-3 py-2">
        <div class="message-header">
            <div class="message-header-left">
                @if ($chat->user_id != null)
                    <img src="{{ asset('storage/images/users/' . $transaction->user->image) }}" alt="profile picture"
                        style="width: 40px; height: 40px; overflow: hidden;">
                    <b>{{ $chat->user->name }}</b>
                @elseif($chat->psychologist_id != null)
                    <img src="{{ asset('storage/images/psychologists/' . $transaction->psychologist->image) }}"
                        alt="profile picture" style="width: 40px; height: 40px; overflow: hidden;">
                    <b>{{ $chat->psychologist->name }}</b>
                @endif
                --
                {{ \Carbon\Carbon::parse($chat->sent_at)->format('l, d F Y @ H:i') }}
            </div>
        </div>
        <div class="message-body">
            <p class="mb-0">{!! $chat->message !!}</p>
        </div>
        @if ($chat->image != null)
            {{ $chat->image }}
            <img src="{{ asset('storage/images/chat/' . $chat->image) }}" alt="image">
        @endif
        <hr class="my-0" />
    </div>
@endforeach

<script>
    var messageContainer = document.querySelector('#message-container');
    messageContainer.scrollTop = messageContainer.scrollHeight - messageContainer.clientHeight;
</script>
