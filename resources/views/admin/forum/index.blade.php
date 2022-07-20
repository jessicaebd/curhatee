@extends('layouts.main-admin')

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

        .see-details:hover {
            text-decoration: underline;
            font-weight: bold;
            color: #0088cc;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <h3 class=" fw-bold">Forum</h3>
        <div class="row">
            @foreach ($forums as $forum)
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="">{{ $forum->title }}</h5>
                        </div>

                        <div class="forum-user p-3">
                            <div class="user-header d-flex justify-content-between ">
                                <div class="d-flex align-items-center">
                                    <div class="user-header-avatar">
                                        <img src="{{ asset('storage/images/users/' . $forum->user->image) }}"
                                            alt="user" class="img-fluid rounded rounded-circle me-2" width="30px"
                                            height="30px">
                                    </div>
                                    <h6 class="user-header-name fw-bolder">{{ $forum->user->name }}</h6>
                                </div>

                                <div class="">
                                    <div class="dropdown">
                                        <a class="link-dark" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="user-forum mt-2 text-secondary">
                                <p class="">{{ Str::limit($forum->content, 200, '...') }}</p>
                            </div>

                            <div class="d-flex align-items-end align-content-end justify-content-between">
                                <div class="d-flex align-items-end align-content-end">
                                    <form action="{{ route('like_forum_user', $forum->id) }}" method="post">
                                        @csrf
                                        <button type="submit p-1"
                                            class="btn-like {{ $forum->is_forum_liked ? 'btn-danger' : 'btn-outline-danger' }}"><i
                                                class="bi bi-heart"></i>
                                            {{ $forum->likes }}</button>
                                    </form>

                                    <a href="{{ route('show_detail_forum', $forum->id) }}"
                                        class="link-secondary mx-2 s-font see-details">See
                                        Details</a>
                                </div>

                                <small class="text-secondary xs-font">{{ $forum->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


        @foreach ($forums as $forum)
            {{ $forum->title }} --- <i
                class="bi bi-clock me-2"></i>{{ \Carbon\Carbon::parse($forum->created_at)->format('l, d F Y - H:i') }}
            ---


            {{-- like button --}}
            {{-- BOLEH LIAT REFERENSI INI STYLING LIKE BUTTONNY: https://codepen.io/Idered/pen/ALYLaM --}}
            <form
                action="{{ Auth::guard('webpsychologist')->user() != null ? route('like_forum_psychologist', $forum->id) : route('like_forum_user', $forum->id) }}"
                method="post">
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
