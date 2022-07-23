{{-- use App\Models\Transaction; --}}
@extends($view == 'User' ? 'layouts.main' : 'layouts.main-psychologist')

@section('title', 'Chat Consultation')

@section('css')
    <style>
        .message-container {
            width: 900px;
            overflow-y: scroll;
            height: 400px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgb(220, 220, 220);
        }

        .input-container {
            width: 900px;
        }
    </style>
@endsection

@section('content')


    @if ($view == 'User')
        <br><br>
    @endif
    <div class="page-container {{ $view == 'User' ? 'py-5' : '' }} d-flex flex-column align-items-center">
        <div class="container">
            {{-- back to psycho.show --}}
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary" aria-label="Close"><i
                        class="bi bi-arrow-left-circle"></i> Back</button></a>
        </div>

        {{-- title --}}
        <h3 class="fw-bold mb-3">Chat with
            {{ $view == 'User' ? $transaction->psychologist->name : $transaction->user->name }}
        </h3>

        {{-- status --}}
        @if (session('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- chat message --}}
        <div class="message-container" id="message-container">
            @include('chat.message')
        </div>

        @if ($transaction->status != 'Finished')
            {{-- input message form --}}
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
                        <div class="col-md-2 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit" id="send-message">@lang('index_chat.send')</button>
                        </div>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <label for="image">Upload Picture (Optional)</label>
                        <input style="width: 70%" type="file" class="form-control" id="image" name="image"
                            placeholder="Choose your profile image">
                    </div>
                </form>
            </div>
        @else
            <h1>@lang('index_chat.consultation_is_finished')</h1>
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
