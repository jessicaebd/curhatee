@extends('layouts.main-admin')

@section('title', 'Manage Articles')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h3 class=" fw-bold">Articles</h3>
            <a href="{{ route('add_article') }}" class="btn btn-primary my-auto">
                <i class="bi bi-plus-circle me-2"></i>Add Article
            </a>
        </div>

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 ">
                    <div class="card mb-3" style="height: 26rem;">
                        <img class="card-img-top"
                            src="{{ file_exists(public_path() . "/storage/articles/$article->image") ? asset("storage/articles/$article->image") : asset('storage/articles/article.jpg') }}"
                            alt="Article image" style="height: 15rem">

                        <div class="card-body">
                            <h5 class="card-title fw-bold m-font">{{ $article->title }}</h5>

                            <div class="row d-flex justify-content-between my-2">
                                <div class="col-6">
                                    <p class="card-text"><small class="text-muted">
                                            {{ Str::words($article->psychologist->name, 3, '') }}</small>
                                    </p>
                                </div>

                                <div class="col-6">
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <i class="bi bi-clock me-2"></i>
                                            {{ $article->updated_at->diffForHumans() }}
                                        </small>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end pt-1">
                                <a href="{{ route('edit_article', $article->id) }}" class="btn btn-primary me-3">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('delete_article', $article->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
