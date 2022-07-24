@extends($view == 'Psychologist' ? 'layouts.main-psychologist' : 'layouts.main')

@section('title', 'Add Forum')

@section('content')
    <h1>@lang('forum.Add Forum')</h1>
    <br>

    <form
        action="{{ Auth::guard('webpsychologist')->user() != null
            ? route('create_forum_psychologist')
            : route('create_forum_user') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-md-4 col-form-label text-md-end">@lang('forum.Title Topic')</label>
            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required
                    autocomplete="title">
            </div>
        </div>
        <div class="row mb-3">
            <label for="content" class="col-md-4 col-form-label text-md-end">@lang('forum.Isi Content')</label>
            {{-- <textarea class="form-control" name="content" id="content" rows="3" placeholder="Type a content..."></textarea> --}}
            <input id="content" type="hidden" name="content">
            <trix-editor input="content"></trix-editor>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">@lang('forum.Add Picture (Optional)')</label>
            <div class="col-md-6">
                <input type="file" class="form-control" id="image" name="image"
                    placeholder="Choose your profile image">
            </div>
        </div>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Submit Button --}}
        <div class="text-center">
            <button type="submit" class="btn btn-primary">@lang('forum.Add Forum')</button>
        </div>
    </form>
@endsection
