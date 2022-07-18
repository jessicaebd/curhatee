@extends($view == 'Psychologist' ? 'layouts.main-psychologist' : 'layouts.main')

@section('title', 'Forum')

@section('css')
    <style>
        .btn-like {
            box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.5) inset;
            border-radius: 3px;
            border: 1px solid;
            display: inline-block;
            height: 18px;
            line-height: 18px;
            padding: 0 8px;
            position: relative;
            font-size: 12px;
            text-decoration: none;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
        }
    </style>
@endsection

@section('content')
    <div class="container">


        <h1>Forum</h1>
        <br>

        <form action="{{ route('create_forum') }}" method="get">
            @csrf
            <button type="submit" class="btn btn-primary ms-3 mt-4 shadow mb-1">+
                Create
                new topic</button>
        </form>

        <hr class="mt-3 mb-3" />

        @foreach ($forums as $forum)
            {{ $forum->title }} --- <i
                class="bi bi-clock me-2"></i>{{ \Carbon\Carbon::parse($forum->created_at)->format('l, d F Y - H:i') }}
            ---


            {{-- like button --}}
            {{-- BOLEH LIAT REFERENSI INI STYLING LIKE BUTTONNY: https://codepen.io/Idered/pen/ALYLaM --}}
            <form action="{{ route('like_forum', $forum->id) }}" method="post">
                @csrf
                <button type="submit"
                    class="btn-like {{ $forum->is_forum_liked ? 'btn-danger' : 'btn-outline-danger' }}"><i
                        class="bi bi-heart"></i>
                    {{ $forum->likes }}
                    likes</button>
            </form>

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
