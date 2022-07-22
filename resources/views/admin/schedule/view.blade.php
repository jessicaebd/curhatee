@extends('layouts.main-admin')

@section('content')
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="fw-bolder">@lang('add_psychologist.psychologist_registration_form')</h3>

                        <hr class="mb-4 pb-2 pb-md-0 mb-md-5" style="color: #2934d0;">

                        @if ($errors->any())
                            <div class="alert
                            alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('add_psychologist') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="name">@lang('add_psychologist.name')</label>
                                    <input type="text" class="form-control form-control-lg" id="name" name="name"
                                        value="{{ old('name') }}">
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-group datepicker w-100">
                                        <label for="birthdayDate" class="form-label">Birthday</label>
                                        <input type="date" class="form-control form-control-lg" id="birthdayDate" />
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Gender: </h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="femaleGender" value="female" checked />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="maleGender" value="male" />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="email">@lang('add_psychologist.email')</label>
                                        <input type="email" class="form-control form-control-lg" id="email"
                                            name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="phone">@lang('add_psychologist.Phone')</label>
                                        <input type="text" class="form-control form-control-lg" id="phone"
                                            name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="hospital_id">@lang('add_psychologist.hospital')</label>
                                    <select class="form-control form-control-lg col-10" id="hospital_id" name="hospital_id">
                                        <option value="">@lang('add_psychologist.select_hospital')</option>
                                        @foreach ($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="fee">@lang('add_psychologist.fee') (IDR)</label>
                                        <input type="number" class="form-control form-control-lg" id="fee"
                                            name="fee" placeholder="0" value="{{ old('fee') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="rating">@lang('add_psychologist.rating')</label>
                                        <input type="number" class="form-control form-control-lg" id="rating"
                                            name="rating" placeholder="1" min="1" max="5"
                                            value="{{ old('rating') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="image">@lang('add_psychologist.profile_picture')</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-5 pt-2">
                                <input class="btn btn-primary btn-lg px-5" type="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
