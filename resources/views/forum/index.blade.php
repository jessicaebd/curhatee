@extends($view == 'Psychologist' ? 'layouts.main-psychologist' : 'layouts.main')

@section('title', 'Forum')

@section('css')
    <style>
        .message-container {
            float: left;
            width: 1000px;
            overflow-y: scroll;
            height: 700px;
            background-color: yellow;
        }

        .btn {
            background-color: #dbdbdb;
            border-color: #bbb;
            color: #666;
        }

        .btn:hover,
        .btn.active {
            text-shadow: 0 1px 0 #b12f27;
            background-color: #f64136;
            border-color: #b12f27;
        }

        .btn:active {
            box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.2) inset;
        }

        .btn span {
            color: #f64136;
        }

        .btn:hover,
        .btn:hover span,
        .btn.active,
        .btn.active span {
            color: #eeeeee;
        }

        .btn:active span {
            color: #b12f27;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.3);
        }
    </style>
@endsection

@section('content')
    <div class="container">


        <h1>Forum</h1>
        <br>

        <a href="{{ route('create_forum') }}"><button type="submit" class="btn btn-primary ms-3 mt-4 shadow mb-1">+
                Create
                new topic</button></a>

        <hr class="mt-3 mb-3" />

        @foreach ($forums as $forum)
            {{ $forum->title }} --- {{ \Carbon\Carbon::parse($forum->created_at)->format('l, d F Y @ H:i') }} ---
            <i class="bi bi-heart"> {{ $forum->likes }}likes</i>

            <br>
            @if ($forum->user_id != null)
                {{ $forum->user->name }}
            @elseif($forum->psychologist_id != null)
                {{ $forum->psychologist->name }}
            @endif
            <br>
            @if ($forum->image != null)
                <img src="{{ asset('storage/images/forum/' . $forum->image) }}" alt="image"
                    style="width: 80px; height: 80px; overflow: hidden;">
            @endif
            <br>
            {{ Str::limit($forum->content, 200, $end = '...') }}
            <br>
            <a href="{{ route('show_detail_forum', $forum->id) }}"><button type="submit"
                    class="btn btn-primary ms-3 mt-4 shadow mb-1">See Details</button></a>
            <hr class="mt-3 mb-3" />
        @endforeach

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
@endsection
