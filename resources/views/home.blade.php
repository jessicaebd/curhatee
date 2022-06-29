@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('consultation') }}">
                    <div class="card home-menu" style="width: 14rem;">
                        <img src="{{ asset('images/menu/consultation.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Consultation</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card home-menu" style="width: 14rem;">
                        <img src="{{ asset('images/menu/forum.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Forum</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card home-menu" style="width: 14rem;">
                        <img src="{{ asset('images/menu/diary.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Diary</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card home-menu" style="width: 14rem;">
                        <img src="{{ asset('images/menu/podcast.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Podcast</h5>
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
                        <b>Article</b>
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
