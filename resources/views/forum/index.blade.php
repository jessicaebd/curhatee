@extends($view == 'Psychologist' ? 'layouts.main-psychologist' : 'layouts.main')

@section('title', 'Forum')

@section('content')
    <h1>Forum</h1>
    <br>

    <a href="{{ route('create_forum') }}"><button type="submit" class="btn btn-primary ms-3 mt-4 shadow mb-1">+
            Create
            new topic</button></a>

    <hr class="mt-3 mb-3" />

    @foreach ($forums as $forum)
        {{ $forum->title }} --- {{ \Carbon\Carbon::parse($forum->created_at)->format('l, d F Y @ H:i') }} ---
        {{ $forum->likes }} likes
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
@endsection