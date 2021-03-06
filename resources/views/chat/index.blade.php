    @extends($view == 'User' ? 'layouts.main' : 'layouts.main-psychologist')

    @section('title', 'Chat Consultation')

    @section('css')
        <style>
            .message-container {
                width: 800px;
                overflow-y: scroll;
                height: 500px;
                border-radius: 15px;
                padding: 10px;
                box-shadow: 0 0 10px rgb(220, 220, 220);
            }

            .input-container {
                width: 800px;
            }

            .day-label {
                font-size: 0.9em;
                color: #868e96;
            }

            .message-body {
                background-color: #c5d1d9;
                padding: 7px 20px;
                border-radius: 0 15px 15px 15px;
                max-width: 60%;
                word-wrap: break-word;
            }

            .message-body-self {
                background-color: #112aca;
                color: white;
                padding: 7px 20px;
                border-radius: 15px 15px 0 15px;
                max-width: 60%;
                word-wrap: break-word;
            }

            .message-img {
                max-width: 30%;
                height: auto;
                margin-top: 10px
            }

            .chat-profile-img {
                width: 35px;
                height: 35px;
                overflow: hidden;
                border-radius: 50%;
                margin-right: 10px;
            }

            .text-muted {
                font-size: 0.8em
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
                <a href="{{ $view == 'User' ? route('my_consultation') : route('psychologist_show', $transaction->id) }}"><button
                        type="button" class="btn btn-secondary" aria-label="Close"><i class="bi bi-arrow-left-circle"></i>
                        @lang('index_chat.Back')</button></a>
            </div>

            {{-- title --}}
            <h5 class="fw-bold mb-3">@lang('index_chat.Chat with')
                {{ $view == 'User' ? $transaction->psychologist->name : $transaction->user->name }}
            </h5>


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
                                    placeholder="Type a message" autocomplete="off">
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <button class="btn btn-primary w-100" type="submit" id="send-message"><i
                                        class="bi bi-send-fill"></i></button>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <label for="image">@lang('index_chat.Upload Picture')<i class="bi bi-paperclip"></i></label>
                            <input style="width: 70%" type="file" class="form-control" id="image" name="image">
                        </div>
                    </form>
                </div>
            @endif
        </div>
    @endsection

    @section('js')
        @if ($transaction->status != 'Finished')
            <script>
                $(document).ready(function() {
                    setInterval(function() {
                        var pos = $('#message-container').scrollTop();
                        var page = window.location.href;

                        $.ajax({
                            url: page + '/message',
                            success: function(data) {
                                $('#message-container').html(data);
                                $('#message-container').scrollTop(pos);
                            }
                        });
                    }, 1000);

                });
            </script>
        @endif
    @endsection
