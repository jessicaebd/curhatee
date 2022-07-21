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

        .panel {
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.075);
            border-radius: 0;
            border: 0;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="container container-margin">
        <h3 class="fw-bold mb-3">{{ $forum->title }}</h3>

        <div class="row border">
            <div class="col-12">
                <div class="forum-card">
                    <div class="forum-user p-3">
                        <div class="user-header d-flex justify-content-between ">
                            <div class="d-flex align-items-center">
                                <div class="user-header-avatar">
                                    <img src="{{ $forum->psychologist_id != null ? asset('storage/images/psychologists/' . $forum->psychologist->image) : asset('storage/images/users/' . $forum->user->image) }}"
                                        alt="user" class="img-fluid rounded rounded-circle me-2" width="30px"
                                        height="30px">
                                </div>
                                <h6 class="user-header-name fw-bolder">
                                    @if ($forum->user_id != null)
                                        {{ $forum->user->name }}
                                    @elseif($forum->psychologist_id != null)
                                        {{ $forum->psychologist->name }}
                                    @endif
                                </h6>
                            </div>

                            {{-- delete button --}}
                            <div class="">
                                <div class="dropdown">
                                    <a class="link-dark" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item text-danger s-font" href="#"><i
                                                    class="bi bi-trash3"></i> Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="user-forum mt-2 text-secondary">
                            @if ($forum->image != null)
                                <img src="{{ asset('storage/images/forum/' . $forum->image) }}" alt="image"
                                    style="width: 50px; height: 50px; overflow: hidden;">
                            @endif
                            <p class="">{{ $forum->content }}</p>
                        </div>

                        <div class="d-flex align-items-end align-content-end justify-content-between">
                            <div class="d-flex align-items-end align-content-end">
                                <form
                                    action="{{ Auth::guard('webpsychologist')->user() != null ? route('like_forum_psychologist', $forum->id) : route('like_forum_user', $forum->id) }}"
                                    method="post">
                                    @csrf
                                    <button type="submit p-1"
                                        class="btn-like {{ $forum->is_forum_liked ? 'btn-danger' : 'btn-outline-danger' }}"><i
                                            class="bi bi-heart"></i>
                                        {{ $forum->likes }}</button>
                                </form>
                                <span class="mx-3">|</span>
                                <a href="#reply" class="link-dark fw-bolder s-font">Reply</a>
                            </div>

                            <small class="text-secondary xs-font">{{ $forum->created_at->diffForHumans() }}</small>
                        </div>

                        <hr class="my-2">
                    </div>
                </div>

                <div class="row justify-content-end">
                    @if ($reply_forums->count() > 0)
                        <div class="col-11">
                            @foreach ($reply_forums as $reply_forum)
                                <div class="forum-card">
                                    <div class="forum-user">
                                        <div class="user-header d-flex justify-content-between ">
                                            <div class="d-flex align-items-center">
                                                <div class="user-header-avatar">
                                                    <img src="{{ $reply_forum->psychologist_id != null ? asset('storage/images/psychologists/' . $reply_forum->psychologist->image) : asset('storage/images/users/' . $reply_forum->user->image) }}"
                                                        alt="user" class="img-fluid rounded rounded-circle me-2"
                                                        width="30px" height="30px">
                                                </div>
                                                <h6 class="user-header-name fw-bolder">
                                                    @if ($reply_forum->user_id != null)
                                                        {{ $reply_forum->user->name }}
                                                    @elseif($reply_forum->psychologist_id != null)
                                                        {{ $reply_forum->psychologist->name }}
                                                    @endif
                                                </h6>
                                            </div>

                                            <div class="">
                                                <div class="dropdown">
                                                    <a class="link-dark" href="#" id="dropdownMenuLink"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </a>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item text-danger s-font" href="#"><i
                                                                    class="bi bi-trash3"></i> Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-forum mt-2 text-secondary">
                                            <p class="">{{ $reply_forum->content }}</p>
                                        </div>

                                        <div class="d-flex align-items-end align-content-end justify-content-between">
                                            <div class="d-flex align-items-end align-content-end">
                                                <form
                                                    action="{{ Auth::guard('webpsychologist')->user() != null ? route('like_reply_forum_psychologist', $reply_forum->id) : route('like_reply_forum_user', $reply_forum->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit p-1"
                                                        class="btn-like {{ $reply_forum->is_reply_forum_liked ? 'btn-danger' : 'btn-outline-danger' }}">
                                                        <i class="bi bi-heart"></i>
                                                        {{ $reply_forum->likes }}
                                                    </button>
                                                </form>
                                            </div>

                                            <small
                                                class="text-secondary xs-font">{{ $reply_forum->created_at->diffForHumans() }}</small>
                                        </div>

                                        <hr class="mt-2 mb-4">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="col-11">
                            <p>There is no reply in this forum.</p>
                        </div>
                    @endif

                    <div class="col-11" id="reply">
                        <form
                            action="{{ Auth::guard('webpsychologist')->user() != null ? route('store_reply_forum_psychologist', $forum->id) : route('store_reply_forum_user', $forum->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="2"
                                placeholder="Type a message..."></textarea>

                            <div class="d-flex align-items-end justify-content-between mb-3">
                                <div class="col-4">
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <button type="submit" class="btn btn-primary ms-3 mt-4 shadow mb-1">Reply</button>
                            </div>
                        </form>

                        {{-- Error Message --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
