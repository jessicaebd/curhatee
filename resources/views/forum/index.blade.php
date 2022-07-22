@extends($view == 'Psychologist' ? 'layouts.main-psychologist' : ($view == 'Admin' ? 'layouts.main-admin' : 'layouts.main'))

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
    <div class="container container-margin">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class=" fw-bold">Forum</h3>

            @if ($view != 'Admin')
                <form
                    action="{{ Auth::guard('webpsychologist')->user() != null
                        ? route('create_forum_psychologist')
                        : route('create_forum_user') }}"
                    method="get">
                    <button type="submit" class="btn btn-outline-blue shadow-sm">+
                        Create
                        new topic</button>
                </form>
            @endif
        </div>
        <div class="row">
            @foreach ($forums as $forum)
                <div class="col-12">
                    <div class="forum-card">
                        <div class="forum-user p-3">
                            <h3 class="fw-bold m-font mb-2"><span
                                    class="text-light xs-font badge rounded-pill bg-green ">#{{ Str::limit(Str::substr($forum->id, -5), 5, '') }}</span>
                                {{ $forum->title }}</h3>

                            <div class="user-header d-flex justify-content-between ">
                                <div class="d-flex align-items-center">
                                    <div class="user-header-avatar">
                                        <img src="{{ $forum->psychologist_id != null ? asset('storage/images/psychologists/' . $forum->psychologist->image) : asset('storage/images/users/' . $forum->user->image) }}"
                                            alt="user" class="img-fluid rounded rounded-circle me-2" width="30px"
                                            height="30px">
                                    </div>
                                    <h6 class="user-header-name fw-bolder">
                                        {{ $forum->psychologist_id != null ? $forum->psychologist->name : $forum->user->name }}
                                    </h6>
                                </div>

                                @if ($view == 'Admin' ||
                                    (Auth::guard('webpsychologist')->user() != null &&
                                        $forum->psychologist_id == Auth::guard('webpsychologist')->user()->id) ||
                                    (auth()->user() != null && auth()->user()->role != 'Admin' && $forum->user_id == auth()->user()->id))
                                    <div class="">
                                        <div class="dropdown">
                                            <a class="link-dark" href="#" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <form
                                                    action="{{ Auth::guard('webpsychologist')->user() != null
                                                        ? route('delete_forum_psychologist', $forum->id)
                                                        : route('delete_forum_user', $forum->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn text-danger">
                                                        <i class="bi bi-trash3 me-2"></i>Delete
                                                    </button>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <div class="user-forum mt-2 text-secondary">
                                <p class="">{{ Str::limit($forum->content, 200, '...') }}</p>
                            </div>

                            <div class="d-flex align-items-end align-content-end justify-content-between">
                                @if ($view != 'Admin')
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
                                        <span class="mx-3 text-secondary">|</span>
                                        <a href="{{ route('show_detail_forum', $forum->id) }}"
                                            class="link-dark fw-bolder s-font see-details">See
                                            Details</a>
                                    </div>
                                @endif

                                <small class="text-secondary xs-font">{{ $forum->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <hr class="my-2">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
