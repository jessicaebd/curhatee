@extends('layouts.main-psychologist')

@section('title', 'Profile Psychologists')

@section('content')

    <div class="content">
        <div class="my_dashboard row mb-4">
            <div class="col-12">
                <h2 class="nav-title l-font border-bottom mb-3">@lang('profile.Profile')</h2>
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row fw-bold m-font">
                                <div class="col-sm-3">
                                    <p class="mb-0">@lang('profile.Name')</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mb-0">{{ $psychologist->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row fw-bold m-font">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mb-0">{{ $psychologist->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row fw-bold m-font">
                                <div class="col-sm-3">
                                    <p class="mb-0">@lang('profile.Phone')</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mb-0">{{ $psychologist->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row fw-bold m-font">
                                <div class="col-sm-3">
                                    <p class="mb-0">@lang('profile.Hospital')</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mb-0">{{ $psychologist->hospital->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row fw-bold m-font">
                                <div class="col-sm-3">
                                    <p class="mb-0">@lang('profile.Fee')</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mb-0">{{ $psychologist->fee }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row fw-bold m-font">
                                <div class="col-sm-3">
                                    <p class="mb-0">@lang('profile.Rating')</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mb-0">{{ $psychologist->rating }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row fw-bold m-font">
                                <div class="col-sm-3">
                                    <p class="mb-0">@lang('profile.Description')</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mb-0">{{ $psychologist->description }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 mt-4">
                                    <a href="{{ route('psychologist_edit_psychologist', $psychologist->id) }}" class="btn btn-outline-primary me-1 flex-grow-1"><i class="bi bi-pencil-square me-2"></i>@lang('profile.Edit Profile')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <h2 class="nav-title l-font border-bottom mb-3">@lang('profile.Transaction')</h2>
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

                <h2 class="nav-title l-font border-bottom mb-3">@lang('profile.Transaction by Status')</h2>
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

                <h2 class="nav-title l-font border-bottom mb-3">@lang('profile.Others')</h2>
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
                                <h5 class="card-title fw-bold m-font">@lang('profile.Rating')</h5>
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

@endsection
