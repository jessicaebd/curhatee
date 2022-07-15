@extends($view == 'User' ? 'layouts.main' : 'layouts.main-psychologist')

@section('title', 'Chat Consultation')

@section('css')
    <style>
        .message-container {
            float: left;
            width: 1000px;
            overflow-y: scroll;
            height: 700px;
            background-color: yellow;
        }
    </style>
@endsection

@section('content')
    <h1>Chat</h1>
    @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="message-container" id="message-container">
        @include('chat.message')
    </div>

    <div class="input-container">
        <form action="{{ route('store_chat_user', $transaction->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="message" id="message" placeholder="Type a message...">
            <div class="row mb-3">
                <label for="image" class="col-md-4 col-form-label text-md-end">Add Picture (Optional)</label>
                <div class="col-md-6">
                    <input type="file" class="form-control" id="image" name="image"
                        placeholder="Choose your profile image">
                </div>
            </div>
            <button type="submit" id="send-message">@lang('index_chat.send')</button>
        </form>
    </div>
    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            setInterval(function() {
                var page = window.location.href;
                $.ajax({
                    url: page + '/message',
                    success: function(data) {
                        $('#message-container').html(data);
                    }
                });
            }, 500);
        });
    </script>
@endsection
