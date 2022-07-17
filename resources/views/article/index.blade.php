<div class="container mt-5">
    @foreach ($articles as $article)
        <div class="row">
            <div class="col-md-4 ">
                <div class="card mb-3">
                    <img src="{{ asset('storage/images/articles/' . $article->image) }}" alt="profile picture"
                        style="width: 100px; height: 100px; overflow: hidden;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>

                        <div class="d-flex justify-content-between">
                            <p class="card-text me-3"><small class="text-muted">{{ $article->author }}</small>
                            </p>
                            <div class="d-flex justify-content-end">
                                <p class="card-text me-3"><small class="text-muted"><i
                                            class="bi bi-clock me-2"></i>{{ $article->created_at }}</small>
                                </p>
                                <p class="card-text"><small class="text-muted">{!! $article->content !!}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-3 mb-3" />
    @endforeach
</div>
