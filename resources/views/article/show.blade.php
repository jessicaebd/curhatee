@extends('layouts.main')

@section('title', 'Detail Article')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="col-md-9">
            <div class="text-center mb-4">
                <h2 class="fw-bold">{{ $article->title }}</h2>
                <small class="fw-bolder">@lang('article.by'): {{ $article->author }}</small> <br>
                <small
                    class="text-muted s-font">{{ \Carbon\Carbon::parse($article->updated_at)->format('l, d F Y - H:i') }}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 shadow rounded">
                {{-- show content --}}
                <img class="rounded mt-3" src="{{ asset('storage/images/articles/' . $article->image) }}" alt=""
                    width="100%">

                <div class="row d-flex justify-content-end mx-3">
                    <div class="col-md-11 text-justify text-secondary">
                        <p class="text-muted">
                            {!! $article->content !!}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    @foreach ($articles->take(5) as $article)
                        <div class="col-md-12 mb-3">
                            <a href="{{ route('show_detail_article', $article->id) }}"
                                class="card border-0 article-card shadow-sm"
                                style="border-radius:15px;width:100%; height:9rem;">
                                <div class="card-body d-flex flex-column justify-content-center p-4">
                                    <h5 class="mb-1 m-font fw-bold">{{ $article->title }}</h5>

                                    <div class="s-font text-muted">{!! Str::limit($article->content, 20, '...') !!}</div>

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
        </div>
    </div>
@endsection
