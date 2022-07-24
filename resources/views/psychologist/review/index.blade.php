@extends('layouts.main-psychologist')

@section('title', 'My Review')

@section('content')
    <div class="container mt-5 pt-5">
        <h3 class="fw-bolder l-font mb-3">@lang('psychologist.My Review')</h3>

        <div class="row">
            @if ($reviews->count() > 0)
                @foreach ($reviews as $review)
                    <div class="col-md-10">
                        <div class="card shadow-sm rounded mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <img class="rounded rounded-pill"
                                            src="{{ asset('storage/images/users/' . $review->user->image) }}" alt=""
                                            style="width: 50px;height: 50px;">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="d-flex justify-content-between">
                                            <span class="fw-bold">{{ $review->user->name }}</span>
                                            <span class="fw-bold s-font">{{ $review->created_at->format('d M Y') }}</span>
                                        </div>

                                        <div class="pe-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $review->rating)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @else
                                                    <i class="bi bi-star text-warning"></i>
                                                @endif
                                            @endfor
                                        </div>

                                        <div class="text-secondary mt-3 s-font text-justify">
                                            {{ $review->comment }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang('psychologist.There is still no review')</h3>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
