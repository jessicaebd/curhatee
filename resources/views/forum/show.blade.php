@extends($view == 'Psychologist' ? 'layouts.main-psychologist' : 'layouts.main')

@section('title', 'Detail Forum')

@section('css')
    <style>
        .forum-container {
            overflow-y: scroll;
            height: 400px;
            /* border: 1px solid grey; */
            /* border-radius: 5px; */
            padding-left: 2em;
            margin-bottom: 1em
        }
    </style>
@endsection

@section('content')
    <div class="container">


        <h1>Detail Forum</h1>
        <br>

        {{ $forum->title }} --- {{ \Carbon\Carbon::parse($forum->created_at)->format('l, d F Y - H:i') }} ---
        <form
            action="{{ Auth::guard('webpsychologist')->user() != null ? route('like_forum_psychologist', $forum->id) : route('like_forum_user', $forum->id) }}"
            method="post">
            @csrf
            <button type="submit" class="btn {{ $is_forum_liked ? 'btn-danger' : 'btn-outline-danger' }}"><i
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
        {{ $forum->content }}
        <br>
        <hr class="mt-3 mb-3" />
        <h5>Replies</h5>
        <hr class="mt-3 mb-3" />

        <div class="forum-container" id="forum-container">
            @foreach ($reply_forums as $reply_forum)
                {{ \Carbon\Carbon::parse($reply_forum->created_at)->format('l, d F Y - H:i') }} ---
                <form
                    action="{{ Auth::guard('webpsychologist')->user() != null ? route('like_reply_forum_psychologist', $reply_forum->id) : route('like_reply_forum_user', $reply_forum->id) }}"
                    method="post">
                    @csrf
                    {{-- @dd($reply_forum->is_reply_forum_liked) --}}
                    <button type="submit"
                        class="btn {{ $reply_forum->is_reply_forum_liked ? 'btn-danger' : 'btn-outline-danger' }}"><i
                            class="bi bi-heart"></i> {{ $reply_forum->likes }}
                        likes</button>
                </form>
                <br>
                @if ($reply_forum->user_id != null)
                    {{ $reply_forum->user->name }}
                @elseif($reply_forum->psychologist_id != null)
                    {{ $reply_forum->psychologist->name }}
                @endif
                <br>
                @if ($reply_forum->image != null)
                    <img src="{{ asset('storage/images/forum/' . $reply_forum->image) }}" alt="image"
                        style="width: 80px; height: 80px; overflow: hidden;">
                @endif
                <br>
                {{ $reply_forum->content }}
                <br>
                <hr class="mt-3 mb-3" />
            @endforeach

        </div>

        <form
            action="{{ Auth::guard('webpsychologist')->user() != null ? route('store_reply_forum_psychologist', $forum->id) : route('store_reply_forum_user', $forum->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="2"
                placeholder="Type a message..."></textarea>
            <div class="row mb-3">
                <label for="image" class="col-md-4 col-form-label text-md-end">Add Picture (Optional)</label>
                <div class="col-md-6">
                    <input type="file" class="form-control" id="image" name="image"
                        placeholder="Choose your profile image">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ms-3 mt-4 shadow mb-1">Reply</button>
        </form>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
@endsection
