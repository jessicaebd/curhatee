@extends('layouts.main-psychologist')

@section('title', 'Profile Psychologists')

@section('content')


    {{ $psychologist->name }}
    <br>
    {{ $psychologist->email }}
    <br>
    {{ $psychologist->phone }}
    <br>
    {{ $psychologist->hospital->name }}
    <br>
    {{ $psychologist->fee }}
    <br>
    {{ $psychologist->image }}
    <br>
    @lang('profile.join at') {{ $psychologist->created_at }}
    <br>
    {{ $psychologist->rating }}
    <br>
    {{ $psychologist->description }}
    <br>

    <div class="content">
        <div class="my_dashboard row mb-4">
            <div class="col-12">
                <h2 class="nav-title l-font border-bottom mb-3">Users</h2>
                {{-- <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Users</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $users->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Total Psychologists</h5>
                                <p class="card-text l-font text-muted fw-bolder">{{ $psychologists->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <h2 class="nav-title l-font border-bottom mb-3">Transaction</h2>
                <div class="row">

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total schedule in a week')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->schedule->count() }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total transaction') </h5>
                                <p class="card-text l-font text-muted fw-bolder"> {{ $psychologist->transaction->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total online consultation')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->transaction->where('consultation_type_id', $online_consultation_id)->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total offline consultation')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->transaction->where('consultation_type_id', $offline_consultation_id)->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="nav-title l-font border-bottom mb-3">Transaction by Status</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total transaction pending')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->transaction->where('status', 'Pending')->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total transaction confirmed')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->transaction->where('status', 'Confirmed')->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total transaction success')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->transaction->where('status', 'Finished')->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total transaction rejected')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->transaction->where('status', 'Rejected')->count() }} </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="nav-title l-font border-bottom mb-3">Others</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total review')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->review->count() }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">Rating</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->rating }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold m-font">@lang('profile.total revenue')</h5>
                                <p class="card-text l-font text-muted fw-bolder">
                                    {{ $psychologist->transaction->where('status', '!=', 'Rejected')->sum('price') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('psychologist_edit_psychologist', $psychologist->id) }}"
            class="btn btn-outline-primary me-1 flex-grow-1">
            <i class="bi bi-pencil-square me-2"></i> @lang('profile.Edit')
        </a>
    </div>

@endsection
