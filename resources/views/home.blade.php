@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                <a href="/consultation/psychologists">
                    <div class="card home-menu" style="width: 18rem;">
                        <img src="{{ asset('storage/images/menu/consultation.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">@lang('home.consultation')</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/forum">
                    <div class="card home-menu" style="width: 18rem;">
                        <img src="{{ asset('storage/images/menu/forum.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">@lang('home.forum')</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/diary">
                    <div class="card home-menu" style="width: 18rem;">
                        <img src="{{ asset('storage/images/menu/diary.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">@lang('home.diary')</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/podcast">
                    <div class="card home-menu" style="width: 18rem;">
                        <img src="{{ asset('storage/images/menu/podcast.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">@lang('home.podcast')</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- Filter Button choose between Article and Video --}}

        <div class="mt-5 d-flex justify-content-center">
            <div class="row px-0 py-2 d-flex justify-content-between shadow-sm rounded-pill"
                style="background-color: #00000005">
                <div class="" style="width: 20rem;">
                    <button class="btn btn-light text-primary shadow-sm btn-block rounded-pill" type="button"
                        data-bs-toggle="collapse" data-bs-target="#filter-article" aria-expanded="false"
                        aria-controls="filter-article" style="width: 100%">
                        <b>@lang('home.article')</b>
                    </button>
                </div>
                <div class="" style="width: 20rem;">
                    <button class="btn text-secondary btn-block rounded-pill" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filter-video" aria-expanded="false" aria-controls="filter-video"
                        style="width: 100%">
                        Video
                    </button>
                </div>
            </div>
        </div>


        @include('article.index')

    @endsection
