@extends('layouts.main-admin')

@section('content')
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="fw-bolder">@lang('edit_hospital.edit_hospital_information')</h3>

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

                        <form action="{{ route('edit_hospital', $hospital->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="name">@lang('edit_hospital.name')</label>
                                    <input type="text" class="form-control form-control-lg" id="name" name="name"
                                        value="{{ old('name') ? old('name') : $hospital->name }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="address">@lang('edit_hospital.address')</label>
                                        <input type="text" class="form-control form-control-lg" id="address"
                                            name="address"
                                            value="{{ old('address') ? old('address') : $hospital->address }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="contact">@lang('edit_hospital.contact')</label>
                                        <input type="text" class="form-control form-control-lg" id="contact"
                                            name="contact"
                                            value="{{ old('contact') ? old('contact') : $hospital->contact }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="image">@lang('edit_hospital.image')</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="description">@lang('edit_hospital.description')</label>
                                    <textarea class="form-control form-control-lg" id="description" name="description" rows="3">{{ old('description') ? old('description') : $hospital->description }}</textarea>
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
