@extends('layouts.main')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('title', 'Article')

@section('content')
    <div class="jumbotron">
        <section class="hero">
            <div class="container z-999">
                <div class="row">
                    <div class="order-2 order-lg-1 d-flex flex-column align-items-center justify-content-center">
                        <h1>Find your best psychologist with <span>Curhatee</span></h1>
                        <h2>Make a better world with a better mental health awareness</h2>
                        <div class="col-4 text-center text-lg-start">
                            <form action="{{ route('search_article') }}" method="GET" class="d-flex">
                                <input class="form-control me-2" type="search" name="keyword" id="keyword"
                                    placeholder="Search article keywords" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                </g>
            </svg>
        </section>
    </div>
    <div class="container mt-5">
        {{-- Popular Post --}}
        <div class="row mb-3">
            @foreach ($articles->take(1) as $article)
                <div class="col-md-12 mb-2">
                    <a href="{{ route('show_detail_article', $article->id) }}" class="card border-0 article-card shadow-sm"
                        style="border-radius:15px;width:100%;">
                        <div class="card-body d-flex justify-content-between p-4">
                            <img src="{{ asset('storage/images/articles/' . $article->image) }}" alt=""
                                class="mb-2 border" style="width: 36rem; height:20rem; border-radius: 15px;">

                            <div class="ms-4 p-3">
                                <span class="badge rounded-pill bg-green">Popular</span>
                                <h3 class="my-1 fw-bold">{{ $article->title }}</h3>

                                <div class="s-font mt-3 text-muted text-justify">{!! Str::limit($article->content, 250, '...') !!}
                                    <span class="fw-bold ms-2">→</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('show_detail_article', $article->id) }}" class="card border-0 article-card shadow-sm"
                        style="border-radius:15px;width:90%; height:30rem;">
                        <div class="card-body d-flex flex-column justify-content-center p-4">
                            <img src="{{ asset('storage/images/articles/' . $article->image) }}" alt=""
                                class="mb-2" style="width: 17rem; height:17rem; border-radius: 15px;">

                            <h5 class="mb-1 l-font fw-bold">{{ $article->title }}</h5>

                            <div class="s-font text-muted">{!! Str::limit($article->content, 60, '...') !!}</div>

                            <p class="my-2 pb-1 xs-font text-muted" style="color: #2b2a2a;">
                                {{ $article->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="go-corner" href="#">
                            <div class="go-arrow">
                                →
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
