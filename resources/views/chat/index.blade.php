@extends($view == 'User' ? 'layouts.main' : 'layouts.main-psychologist')

@section('title', 'Chat Consultation')

@section('css')
    <style>
        .message-container {
            width: 900px;
            overflow-y: scroll;
            height: 400px;
            /* background-color: yellow; */
            border: 1px solid black;
            /* border-radius: 5px; */
        }

        .input-container {
            width: 900px;
        }
    </style>
@endsection

@section('content')
    <div class="pt-3 d-flex flex-column align-items-center">
        <h3>Chat</h3>
        @if (session('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="message-container" id="message-container">
            @include('chat.message')
        </div>

        <div class="input-container mt-3">
            <form
                action="{{ Auth::guard('webpsychologist')->user() != null
                    ? route('store_chat_psychologist', $transaction->id)
                    : route('store_chat_user', $transaction->id) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="message" id="message"
                            placeholder="Type a message...">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit" id="send-message">@lang('index_chat.send')</button>
                    </div>

                </div>
                {{-- <div class="row"> --}}
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <label for="image">Upload Picture (Optional)</label>
                    <input style="width: 70%" type="file" class="form-control" id="image" name="image"
                        placeholder="Choose your profile image">
                </div>
                {{-- </div> --}}
            </form>
        </div>
        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
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
