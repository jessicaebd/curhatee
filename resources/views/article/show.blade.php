@extends('layouts.main')

@section('title', 'Detail Article')

@section('content')
    <div class="container mt-5">
        <div class="col">
            <img src="{{ asset('storage/images/articles/' . $article->image) }}" alt="profile picture"
                style="width: 100px; height: 100px; overflow: hidden;">
            <h5 class="title">{{ $article->title }}</h5>
            <div class="justify-content-between">
                <p class="text me-3"><small class="text-muted">{{ $article->author }}</small>
                </p>
                <div class="justify-content-end">
                    <p class="text me-3"><small class="text-muted"><i
                                class="bi bi-clock me-2"></i>{{ \Carbon\Carbon::parse($article->updated_at)->format('l, d F Y - H:i') }}</small>
                    </p>
                    <p class="text">
                        <small class="text-muted">{!! $article->content !!}</small>
                    </p>
                </div>
            </div>
        </div>
        <hr class="mt-3 mb-3" />
    </div>
@endsection
