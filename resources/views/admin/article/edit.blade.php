@extends('layouts.main')

@section('title', 'Edit Article')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('edit_article.edit_article')</h3>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('update_article', $article->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title">@lang('edit_article.title')</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter title" value="{{ old('title') ? old('title') : $article->title }}">
                                {{-- @error('title')
                                    <div class="alert alert-danger visible">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="form-group mb-3">
                                <label for="author">@lang('edit_article.author')</label>
                                <input type="text" class="form-control" id="author" name="author"
                                    placeholder="Enter author"
                                    value="{{ old('author') ? old('author') : $article->author }}">
                                {{-- @error('author')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">@lang('edit_article.image')</label>
                                <input type="file" class="form-control" id="image" name="image">
                                {{-- @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="form-group mb-3">
                                <label for="content">@lang('edit_article.content')</label>
                                <textarea class="form-control" id="content" name="content" cols="30" rows="10">{{ old('content') ? old('content') : $article->content }}</textarea>
                                {{-- @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">@lang('edit_article.edit_article')</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
