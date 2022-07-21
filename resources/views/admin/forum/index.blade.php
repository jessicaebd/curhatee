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
                                        <img src="{{ $forum->psychologist_id != null ? asset('storage/images/psychologists/' . $forum->psychologist->image) : asset('storage/images/users/' . $forum->user->image) }}"
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
                                            <form action="{{ route('delete_forum', $forum->id) }}" method="post">
                                                @csrf
                                                <li><a class="btn text-danger"><i class="bi bi-trash3"></i>Delete</a></li>
                                            </form>
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

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
@endsection
