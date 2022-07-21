@extends('layouts.main')

@section('title', 'Article')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4">
                    <a href="{{ route('show_detail_article', $article->id) }}">
                        <div class="card mb-3">
                            <img src="{{ asset('storage/images/articles/' . $article->image) }}" alt="profile picture"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>

                                {{-- <div class="d-flex justify-content-between"> --}}
                                <p class="card-text me-3"><small class="text-muted">{{ $article->author }}</small>
                                </p>
                                {{-- <div class="d-flex justify-content-end"> --}}
                                <p class="card-text me-3"><small class="text-muted"><i
                                            class="bi bi-clock me-2"></i>{{ \Carbon\Carbon::parse($article->updated_at)->format('l, d F Y - H:i') }}</small>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">{!! Str::limit($article->content, 300, $end = '...') !!}</small>
                                </p>
                                {{-- </div> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
