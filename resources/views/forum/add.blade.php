@extends($view == 'Psychologist' ? 'layouts.main-psychologist' : 'layouts.main')

@section('title', 'Create New Forum')

@section('content')
    <div class="containter mt-5 pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('forum.Create New Forum')</h3>
                    </div>

                    <div class="card-body">
                        <form
                            action="{{ Auth::guard('webpsychologist')->user() != null
                                ? route('create_forum_psychologist')
                                : route('create_forum_user') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <input id="title" type="text" class="form-control" name="title"
                                        value="{{ old('title') }}" required autocomplete="title"
                                        placeholder="Enter your forum title here...">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <input id="content" type="hidden" name="content" placeholder="Content">
                                <trix-editor input="content" placeholder="Enter your content here..."></trix-editor>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="Choose your profile image">
                                </div>
                                <div class="col-md-2">
                                    <label for="image" class="col-form-label text-md-end m-font text-muted">
                                        (@lang('forum.Optional'))</label>
                                </div>
                            </div>

                            {{-- Error Message --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            {{-- Submit Button --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">@lang('forum.Add Forum')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
